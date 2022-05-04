<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login($email,$password){
        $result = User::selectRaw('CONCAT(first_name, ",", last_name) as Name, id,role_id,county_id')
        ->where('Users.email','=',$email)
        ->where('Users.password','=',$password)
        ->get();
        $result = $result->values()->all();
        return $result;     
    }
}
