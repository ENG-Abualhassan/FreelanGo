<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Notifications\verifyEmailNotification;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use function PHPUnit\Framework\returnArgument;

class AuthController extends Controller
{
    public function indexLogin(Request $request)
    {
        $guard = $request->route('guard');
        return view('auth.login', compact('guard'));
    }
    public function login(Request $request)
    {
        $guard = $request->route('guard');
        if ($guard == 'web')
            $guard = 'users';
        $data = $request->validate(
            [
                'email' => "required|email||max:255|exists:$guard,email",
                'password' => "required|string|min:3"
            ],
            [
                'email.required' => 'البريد الالكتروني مطلوب',
                'email.exists' => 'هذا البريد الاكتروني غير مسجل',
                'password.min' => 'كلمة المرور يجب ان تتجاوز ال3 حروف على',
            ]
        );
        // Make auth for the user by the guard and make attempt for the data and make a cookie if the user make remember me
        if ($guard == 'users')
            $guard = 'web';
        if (Auth::guard($guard)->attempt($data, $request->filled('remember'))) {
            return response()->json(['success' => true, 'redirect' => route("$guard.dashboard")]);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة',
            ]);
        }

    }
    public function indexRegister(Request $request)
    {
        $guard = $request->route('guard');
        return view('auth.register', compact('guard'));
    }
    public function register(Request $request)
    {
        $guard = $request->accountType;
        $provider = config("auth.guards.$guard.provider");
        $model = config("auth.providers.$provider.model");
        if ($request->confirmPassword === $request->password)
            $password = $request->password;
        $token = Str::random();
        $newUser = $model::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($password),
            'verification_token' => $token,
            'verification_token_send_at' => now()
        ]);
        $newUser->notify(new verifyEmailNotification($token, $guard));
        return 'تم ارسال رابط تحقق للبريد الالكتروني ' . $request->email;
    }
    public function indexForgetpassword(Request $request)
    {
        $guard = $request->route('guard');
        return view('auth.forget-password', compact('guard'));
    }

    public function forgetpassword(Request $request)
    {
        $guard = $request->route('guard');
        if($guard == 'web') $guard = 'users';
        $request->validate(
            [
                'email' => "required|email|exists:$guard,email"
            ],
            [
                'email.required' => 'البريد الالكتروني مطلوب',
                'email.exists' => 'هذا البريد الاكتروني غير مسجل',
            ]
        );
        $broker = $this->getpasswordbroker($guard);

        $status = Password::broker($broker)->sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['status' => 'تم ارسال الرابط بنجاح '])
            : response()->json(['status' => 'حدث خطأ ما , يرجى اعادة المحاولة لاحقا']);
    }
    public function indexResetpassword(Request $request, string $token = null)
    {
        $guard = $request->route('guard');
        $email = $request->query('email');
        return view('auth.reset-password', compact('guard', 'token', 'email'));
    }
    public function resetpassword(Request $request)
    {
        $guard = $request->route('guard');
        $request->validate(
            [
                'password' => 'required|confirmed',
            ],
            [
                'password.required' => 'قم بادخال كلمة المرور الجديدة',
                'password.confirmed' => 'كلمتا المرور غير متطابقتان',
            ]
        );
        $broker = $this->getpasswordbroker($guard);
        // dd($broker);
        $status = Password::broker($broker)->reset(
            $request->only('email', 'password', 'password_confirmation')+['token' => $request->route('token')]
            ,
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );
        return $status === Password::PasswordReset
            ? response()->json(['status' => 'تم اعادة تعيين كلمة المرور بنجاح'])
            : response()->json(['status' => 'حدث خطأ ما , يرجى المحاولة لاحقا']);
    }
    private function getpasswordbroker(string $guard)
    {
        return match ($guard) {
            'admins' => 'admins',
            'freelancers' => 'freelancers',
            default => 'users'
        };
    }

}









































































//     public function forgetpassword(Request $request)
//     {
//         $guard = $request->route('guard');
//         $provider = config("auth.guards.$guard.provider");
//         $model = config("auth.providers.$provider.model");

//         if ($guard == 'web')$guard = 'users';

//          $request->validate(
//             [
//                 'email' => "required|email||max:255|exists:$guard,email",
//             ],
//             [
//                 'email.required' => 'البريد الالكتروني مطلوب',
//                 'email.exists' => 'هذا البريد الاكتروني غير مسجل',
//             ]
//         );
//         $token = Str::random();
//         $user = $model::where('email' , $request->email)->first();
//         $user->update([
//             'verification_token' => $token,
//             'verification_token_send_at' => now()
//         ]);

//         if ($guard == 'users')$guard = 'web';

//         $user->notify(new verifyEmailNotification($token, $guard));
//         return response()->json(['success' => true]);
//     }
//     public function indexResetpassword(Request $request)
//     {
//         $guard = $request->route('guard');
//         return view('auth.reset-password' , compact('guard')) ;
//     }
//     public function resetpassword(Request $request)
//     {
//         $guard = $request->route('guard');
//         $provider = config("auth.guards.$guard.provider");
//         $model = config("auth.providers.$provider.model");
//         $request->validate([
//             'password' => 'required|string|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
//             'confirmPassword' => 'required|string'
//         ],[
//             'password.required' => 'كلمة المرور مطلوبة',
//             'confirmPassword' => 'تأكيد كلمة المرور مطلوب',
//             'password.min' => 'كلمة المرور يجب أن تكون 8 احرف على الاقل',
//             'password.regex' => 'يجب الالتزام بشروط التالية لتعيين كلمة مرور جديدة'
//         ]);
//         if($guard === 'web') $guard = 'users';

//         if($request->password === $request->confirmPassword):
//             $model::update([

//             ]);
//         else :
//             return response()->json(['success' => false , 'message' => 'كلمتا المرور غير متطابقتان']);    
//         endif;
//     }
// }
