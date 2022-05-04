<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userbenefit;


class UserbenefitController extends Controller
{
    public function registerBenefit(Request $req){
        $Userbenefit= new UserBenefit;
        $Userbenefit->benefit_id= $req->benefitId;
        $Userbenefit->user_id= $req->userId;
        $Userbenefit->benefit_type= $req->type;
        $Userbenefit->county_id= $req->county_id;
        $Userbenefit->save();
        return $Userbenefit;

    }
    public function getUserbenefits(){
        $result = Userbenefit::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function getUserbenefitsByCount($benefit_type){
        $result =  Userbenefit::all()
        ->where('benefit_type','=',$benefit_type)
        ->count();
        return $result;     
    }
    public function getUserbenefitsByCountForInspectors($benefit_type,$county_id){
        $result =  Userbenefit::all()
        ->where('benefit_type','=',$benefit_type)
        ->where('county_id','=',$county_id)
        ->count();
        return $result;     
    }
    

    public function getUserbenefitsForResidents($user_id){
        return UserBenefit::select('UserBenefits.user_id', 'Userbenefits.id', 'Userbenefits.name')
        ->rightJoin('Userbenefits',function($join)use ($user_id) {
            $join->on('UserBenefits.benefit_id','=','Userbenefits.id')
            ->where('UserBenefits.user_id','=',$user_id)
            ->where('UserBenefits.benefit_type','=','Userbenefits');
        })
        ->groupBy('UserBenefits.user_id', 'Userbenefits.id', 'Userbenefits.name')
        ->get();
    }
    
}
