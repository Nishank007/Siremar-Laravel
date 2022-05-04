<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserBenefit;

class UserController extends Controller
{
    public function addUser(Request $req){
        try{
        $User= new User;
        $User->first_name= $req->first_name;
        $User->last_name= $req->last_name;
        $User->dob= $req->dob;
        $User->email= $req->email;
        $User->role_id= $req->role_id;
        $User->phone_number= $req->phone_number;
        $User->street1= $req->street1;
        $User->street2= $req->street2;
        $User->county_id= $req->county_id;
        $User->password= $req->password;
        $User->save();
        return $User;
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        } 

    }
    public function getUsers(){
        $result = User::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function getResidents(){
        $result = User::selectRaw('count(*) as count')
        ->where('role_id', 2)
        ->groupBy('id')
        ->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function getUsersForResidents($user_id){
        return UserBenefit::select('userId','Users.name')
        ->rightJoin('Users', 'UserBenefits.benefit_id', '=', 'Users.id')
        ->where('UserBenefits.user_id', $user_id)
        ->get();
    }

    public function getUsersForInspectors($county_id){
        $result = User::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('county_id', $county_id)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }
    

    public function getUserById($id){
        return User::find($id);
    }

    public function deleteUserById($id){
        $User= User::find($id);
        $User->delete();
        return 'User deleted successfully';
    }
}
