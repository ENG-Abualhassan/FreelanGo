<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify(Request $request , $guard)
    {
        $token = $request->query('token');
        $provider = config("auth.guards.$guard.provider");
        $model = config("auth.providers.$provider.model");

        $user = $model->where('verification_token' , $token )->first();
        $sendAt = Carbon::parse($user->verification_token_send_at);
        if(Carbon::now()->diffInHours($sendAt) > 24) return 'انتهت صلاحية رابط التحقق!';
        $user->update([
            'verification_token' => null,
            'verification_token_send_at' => null,
            'email_verified_at' => now()
        ]);
        return view('auth.reset-password')->with('userEmail' , $user->email);
    }
}
