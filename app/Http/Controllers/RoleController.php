<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;


class RoleController extends Controller
{
    //
    public function addRole(){

        $roles = [
            ['name'=>'Administrator'],
            ['name'=>'Editor'],
            ['name'=>'Author'],
            ['name'=>'Contributor'],
            ['name'=>'Subscribers'], 
        ];

        Role::insert($roles);
        return "Roles are created successfully!";
    }

    public function AddUser(){

        $user = new User();
        $user->name     = 'Lovely Joy';
        $user->email    ='balabaindoso@gmail.com';
        $user->password =encrypt('secret');
        $user->save();
        
        $roleids = [
            3, 2, 5
        ];

        $user->role()->attach($roleids);

        return "record has been created successfully!"; 
    }

    public function getAllRolesByUser($id){
        $user = User::find($id);
        $roles = $user->role; 
        return $roles; 
    }

    public function getAllUserByRole($id){

        $role =  Role::find($id);
        $users = $role->users;
        return $users;
    }
}
