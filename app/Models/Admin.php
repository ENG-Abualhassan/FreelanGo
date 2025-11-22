<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class Admin extends Authenticatable 
{
    use HasFactory, Notifiable , HasRoles;
    protected $guarded = [];
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\ForgetPasswordNotification('admins' , $token));
    }
}
