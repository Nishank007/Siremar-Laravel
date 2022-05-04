<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;
use App\Models\UserBenefit;
Use Exception;

class CountyController extends Controller
{
    public function addCounty(Request $req){
        $County= new County;
        $County->county_name= $req->county_name;
        $County->save();
        return $County;

    }
    public function getCounties(){
        $result = County::select('county_name','id')->get();
        $result = $result->values()->all();
        return $result;   
    }

    public function updateCounty(Request $req){
        $County = County::find($req->id);
        $County->id=$req->id;
        $County->county_name= $req->county_name;
        $County->save();
        return $County;    
    }

    public function getCountysForResidents($user_id){
        return UserBenefit::select('userId','Countys.name')
        ->rightJoin('Countys', 'UserBenefits.benefit_id', '=', 'Countys.id')
        ->where('UserBenefits.user_id', $user_id)
        ->get();
    }

    public function getCountysForInspectors($county_id){
        $result = County::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('county_id', $county_id)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }
    

    public function getCountyById($id){
        return County::find($id);
    }

    public function deleteCountyById($id){
        $County= County::find($id);
        $County->delete();
        return 'County deleted successfully';
    }
}
