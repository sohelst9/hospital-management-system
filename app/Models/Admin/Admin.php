<?php

namespace App\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use Notifiable, HasRoles;
    protected $guard = 'admin';
    protected $fillable = [
        'username', 'email', 'phone', 'image', 'password', 'Is_admin',
    ];
    protected $hidden = [
      'password', 'remember_token',
    ];
}
