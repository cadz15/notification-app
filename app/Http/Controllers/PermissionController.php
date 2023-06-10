<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //

    public function index() {
        $roles = Role::paginate(20);

        return view('permission.index', compact('roles'));
    }

    public function createIndex() {
        $users = User::all();

        return view('permission.create-permission', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'permission-recipient' => 'required',
            'permission-name' => 'required'
        ]);

        $user = User::where('id', $request['permission-recipient'])->first();

        $role = Role::firstOrCreate(['name' => 'viewOnly']);

        $permission = Permission::make(['name' => $request['permission-name']]);

        $permission->saveOrFail();

        $permission->assignRole($role);

        $user->assignRole('viewOnly');
        $user->removeRole('superadmin');


        return redirect('/permission');
    }
}
