<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends AuthenticatableUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
