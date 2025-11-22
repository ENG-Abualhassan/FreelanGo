<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Freelancer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = [];
      public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\ForgetPasswordNotification('freelancers' , $token));
    }
      
}
