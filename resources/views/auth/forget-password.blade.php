@extends('layout.auth')
@section('title')
    استعادة كلمة المرور - FreelanGo
@endsection
@section('content')
    <section class="reset-section">
        <div class="reset-container">
            <div class="reset-header">
                <div class="reset-icon">
                    <i class="fas fa-key"></i>
                </div>
                <h1>استعادة كلمة المرور</h1>
                <p>أدخل بريدك الإلكتروني المسجل وسنرسل لك رابطًا لاستعادة كلمة المرور الخاصة بك</p>
            </div>

            <form class="reset-form" method="POST" action="{{ route("$guard.forgetpassword.submit") }}">
                @csrf
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> البريد الإلكتروني</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="ادخل بريدك الإلكتروني">
                    </div>
                </div>

                <button type="submit" class="btn-reset" id="resetBtn">
                    <i class="fas fa-paper-plane"></i> إرسال رابط الاستعادة
                    <i class="fas fa-spinner fa-spin"></i>
                    <i class="fas fa-check"></i>
                </button>

                <div class="success-message" id="successMessage">
                    <i class="fas fa-check-circle"></i>
                    <h3>تم إرسال رابط الاستعادة بنجاح!</h3>
                    <p>لقد أرسلنا رابطًا لاستعادة كلمة المرور إلى بريدك الإلكتروني. يرجى التحقق من صندوق الوارد.</p>
                </div>
            </form>

            <div class="links-container">
                <a href="{{ route("$guard.login") }}"><i class="fas fa-arrow-left"></i> العودة لتسجيل الدخول</a>
                @if ($guard !== 'admins')
                    <a href="{{ route("$guard.register") }}"><i class="fas fa-user-plus"></i> إنشاء حساب جديد</a>
                @endif
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.reset-form').on('submit', function (e) {
                e.preventDefault();
                $('.error-text').remove();
                let email = $('#email').val().trim();
                valid = true;
                if (email === "") {
                    $('#email').after('<span class="error-text" style="color:red;">البريد الإلكتروني مطلوب</span>');
                    valid = false;
                } else if (!validateEmail(email)) {
                    $('#email').after('<span class="error-text" style="color:red;">أدخل بريد إلكتروني صالح</span>');
                    valid = false;
                }
                if (!valid) return;
                 $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.status) {
                            $('#successMessage').show();
                        } else {
                            notyf.error('حدث خطأ ما');
                        }
                    },
                    error: function (xhr) { 
                        $('.error-text').remove(); 
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function (key, value) {
                                $('#' + key).after('<span class="error-text" style="color:red; text-align:right; display:block;">' + value[0] + '</span>');
                                $('#' + key).next('.error-text').fadeIn(300);
                            });
                        }
                        if(xhr.status === 401){
                            let message = xhr.responseJSON.message;
                            notyf.error(response.message);
                        }
                    }
                });
            });
        });
    </script>
@endsection