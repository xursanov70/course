<?php

namespace App\Http\Controllers;

use App\Models\UserRole;

abstract class Controller
{
    public function can($role)
    {
        $can = UserRole::join('users', 'users.id', '=', 'user_roles.user_id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('user_roles.role', '=', $role)
            ->first();
    if (!$can){
        return 'denied';
    }else{
        return 'can';
    }

        }
}
