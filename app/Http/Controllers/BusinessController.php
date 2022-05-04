<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\UserBenefit;

class BusinessController extends Controller
{
    public function addBusiness(Request $req){
        $Business= new Business;
        $Business->description= $req->description;
        $Business->phone_number= $req->phone_number;
        $Business->street1= $req->street1;
        $Business->street2= $req->street2;
        $Business->county_id= $req->county_id;
        $Business->type= $req->type;
        $Business->benefits= $req->benefits;
        $Business->save();
        return $Business;

    }
    public function getBusinesses(){
        $result = Business::selectRaw('description as Description,CONCAT(street1, ",", street2) as Address, id')->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function updateBusiness(Request $req){
        $Business = Business::find($req->id);
        $Business->id=$req->id;
        $Business->description= $req->description;
        $Business->phone_number= $req->phone_number;
        $Business->street1= $req->street1;
        $Business->street2= $req->street2;
        $Business->county_id= $req->county_id;
        $Business->type= $req->type;
        $Business->benefits= $req->benefits;
        $Business->save();
        return $Business;    
    }
   

    public function getBusinessesForResidents($user_id){
        return UserBenefit::select('UserBenefits.user_id', 'Business.id', 'Business.description')
        ->rightJoin('Business',function($join)use ($user_id) {
            $join->on('UserBenefits.benefit_id','=','Business.id')
            ->where('UserBenefits.user_id','=',$user_id)
            ->where('UserBenefits.benefit_type','=','Business');
        })
        ->groupBy('UserBenefits.user_id', 'Business.id', 'Business.description')
        ->get();
    }

    public function getBusinessesForInspectors($county_id){
        $result = Business::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('county_id', $county_id)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }
    

    public function getBusinessById($id){
        return Business::find($id);
    }

    public function deleteBusinessById($id){
        $Business= Business::find($id);
        $Business->delete();
        return 'Business deleted successfully';
    }
    public function getBusinessReportForResidents($user_id){
        return UserBenefit::select('Business.description as Description')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Business','UserBenefits.benefit_id','=','Business.id')
        ->where('Users.id','=',$user_id)
        ->where('UserBenefits.benefit_type','=','Business')
        ->groupBy('Business.description')
        ->get();
    }
    public function getBusinessReport(){
        return UserBenefit::selectRaw('count(Users.id) as Number_of_Residents_registered,Business.description as Description,UserBenefits.id')
        ->leftJoin('Users','UserBenefits.user_id','=','Users.id')
        ->leftJoin('Business','UserBenefits.benefit_id','=','Business.id')
        ->where('UserBenefits.benefit_type','=','Business')
        ->groupBy('Business.id','Business.description','Users.id','UserBenefits.id')
        ->get();
    }
}
