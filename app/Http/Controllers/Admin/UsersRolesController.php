<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersRolesController extends Controller
{
    
    public function update(Request $request, User $user)
    {
        
        $user->roles()->detach();
        
        if ($request->filled('roles'))
        {

        	$user->assignRole($request->roles);
        }	

        return back()->withFlash('Los Roles han sido actualizados');

    }

}
