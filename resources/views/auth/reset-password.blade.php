@extends('layout.auth')
@section('title')
    تعيين كلمة مرور جديدة - freelanGo
@endsection
@section('content')
    <section class="reset-section">
        <div class="reset-container">
            <div class="reset-header">
                <div class="reset-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h1>تعيين كلمة مرور جديدة</h1>
                <p>من فضلك أدخل كلمة مرور جديدة لحسابك. تأكد من أنها آمنة وسهلة التذكر</p>
            </div>

            <form id="resetForm" class="reset-form" method="POST" action="{{ route("$guard.resetpassword.submit") }}">
                @csrf
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> كلمة المرور الجديدة</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="hidden" value="{{ $email }}" name="email">
                        <input type="hidden" value="{{ $token }}" name="token">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="أدخل كلمة مرور جديدة" >
                        <span class="password-toggle" id="passwordToggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    <div class="password-strength">
                        <div class="password-strength-meter" id="passwordStrength"></div>
                    </div>

                    <div class="password-rules">
                        <p>يجب أن تحتوي كلمة المرور على:</p>
                        <ul>
                            <li id="rule-length"><i class="fas fa-circle"></i> 8 أحرف على الأقل</li>
                            <li id="rule-uppercase"><i class="fas fa-circle"></i> حرف كبير واحد على الأقل</li>
                            <li id="rule-number"><i class="fas fa-circle"></i> رقم واحد على الأقل</li>
                            <li id="rule-special"><i class="fas fa-circle"></i> رمز خاص واحد على الأقل</li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirmPassword"><i class="fas fa-lock"></i> تأكيد كلمة المرور</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="أعد إدخال كلمة المرور الجديدة" >
                        <span class="password-toggle" id="confirmPasswordToggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div id="passwordMatch" class="password-rules" style="display:none;">
                        <p><i class="fas fa-check-circle valid"></i> كلمتا المرور متطابقتان</p>
                    </div>
                </div>

                <button type="submit" class="btn-reset" id="resetBtn">
                    <i class="fas fa-key"></i> تعيين كلمة المرور الجديدة
                    <i class="fas fa-spinner fa-spin"></i>
                    <i class="fas fa-check"></i>
                </button>

                <div class="success-message" id="successMessage">
                    <i class="fas fa-check-circle"></i>
                    <h3>تم تحديث كلمة المرور بنجاح!</h3>
                    <p>تم تحديث كلمة المرور الخاصة بحسابك بنجاح. يمكنك الآن تسجيل الدخول باستخدام كلمة المرور الجديدة.</p>
                </div>
            </form>
            <div class="links-container">
                <a href="{{ route("$guard.login") }}"><i class="fas fa-arrow-left"></i> العودة لتسجيل الدخول</a>
                @if ($guard !== 'admins')
                    <a href="{{ route("$guard.register") }}"><i class="fas fa-user-plus"></i> إنشاء حساب جديد</a>
                @endif
            </div>
    </section>
@endsection
@section('script')
    <script>
        $('#resetForm').on('submit' , function(e){
            e.preventDefault();
            $('.error-text').remove(); 
            $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.status == true) {
                            $('#successMessage').show();
                        }else{
                            $('#successMessage').hide();
                            notyf.error(response.status);
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
                    }
                });
        });
    </script>
@endsection