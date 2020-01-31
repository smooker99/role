<?php

namespace App\Http\Controllers;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;


class RoleController extends Controller
{

    public function index(){
        $roles=Role::all();

        return view('role.index',compact('roles'));

    }
    public function show(){

    }
    public function create(){
         $permissions=Permission::all();
        return view('role.create',compact('permissions'));
    }
    public function store(Request $request){


        $p = $request->input('name_p');
        $r = $request->input('name');

        $role = Role::create($r);
        foreach ($p as $perm){
            $permission=Permission::findByName($perm);
            $permission->assignRole($role);
            $role->givePermissionTo($permission);

        }

        return view('/role');
    }

    public function affecter_view (Role $role){

        $user=User::all();
        return view('role.affecter',compact('role','user'));
    }
    public function affecter(Request $request,Role $role_n){
        $username = $request->input('user');
        $role=Role::findByName($role_n->name);
        $user=User::where('name',$username)->first();
        $user->assignRole($role);
        return view('role.index');
    }
    public function edit(){

    }
    public function update(){

    }
    public function destroy(){

    }


}
