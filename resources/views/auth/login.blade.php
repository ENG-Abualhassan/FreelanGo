@extends('layout.auth')
@section('title')
    تسجيل الدخول - FreelanGo
@endsection
@section('content')
    <section class="login-section">
        <div class="login-container">
            <div class="login-illustration">
                <h2>مرحبًا بعودتك!</h2>
                <p>سجل دخولك الآن للوصول إلى آلاف المشاريع والفرص الاستثنائية في أكبر منصة عمل حر عربية</p>
                <img src="https://cdn.dribbble.com/users/1577044/screenshots/6539426/authentication.png" alt="تسجيل الدخول">
            </div>

            <div class="login-form-container">
                <div class="login-header">
                    <h1>تسجيل الدخول</h1>
                    <p>أدخل بيانات حسابك للوصول إلى لوحة التحكم</p>
                </div>

                <form id="loginForm" method="post" action="{{ route("$guard" . ".login.submit") }}">
                    @csrf
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> البريد الإلكتروني</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="ادخل بريدك الإلكتروني">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> كلمة المرور</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="ادخل كلمة المرور">
                        </div>
                    </div>

                    <div class="remember-forgot">
                        <div class="remember-me">
                            <input type="checkbox" id="remember">
                            <label for="remember">تذكرني</label>
                        </div>
                            <a href="{{ route("$guard.forgetpassword") }}" class="forgot-password">هل نسيت كلمة المرور؟</a>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> تسجيل الدخول
                    </button>

                    <div class="social-login">
                        <p>أو سجل الدخول باستخدام</p>
                        <div class="social-buttons">
                            <div class="social-btn google">
                                <i class="fab fa-google"></i>
                            </div>
                            <div class="social-btn facebook">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            <div class="social-btn twitter">
                                <i class="fab fa-twitter"></i>
                            </div>
                        </div>
                    </div>
                    @if ($guard !== 'admins')
                        <div class="signup-link">
                            ليس لديك حساب؟ <a href="{{ route("$guard.register") }}">إنشاء حساب جديد</a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $('#loginForm').on('submit', function (e) {
                e.preventDefault();
                $('.error-text').remove();
                let email = $('#email').val().trim();
                let password = $('#password').val().trim();
                let valid = true;

                if (email === '') {
                    $('#email').after('<span class="error-text" style="color:red;">البريد الإلكتروني مطلوب</span>');
                    valid = false;
                } else if (!validateEmail(email)) {
                    $('#email').after('<span class="error-text" style="color:red;">أدخل بريد إلكتروني صالح</span>');
                    valid = false;
                }

                if (password === '') {
                    $('#password').after('<span class="error-text" style="color:red;">كلمة المرور مطلوبة</span>');
                    valid = false;
                } else if (password.length < 3) {
                    $('#password').after('<span class="error-text" style="color:red;">كلمة المرور يجب أن تكون 6 أحرف على الأقل</span>');
                    valid = false;
                }

                if (!valid) return;

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.success) {
                            window.location.href = response.redirect;
                        } else {
                            notyf.error(response.message);
                        }
                    },
                    error: function (xhr) {
                        $('.error-text').remove();
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function (key, value) {
                                $('#' + key).after('<span class="error-text" style="color:red;">' + value[0] + '</span>');
                                $('#' + key).next('.error-text').fadeIn(300);
                            });
                        }
                        if (xhr.status === 401) {
                            let message = xhr.responseJSON.message;
                            notyf.error(response.message);
                        }
                    }
                });
            });


        });
    </script>
@endsection