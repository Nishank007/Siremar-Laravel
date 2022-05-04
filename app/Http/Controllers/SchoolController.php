<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\UserBenefit;

class SchoolController extends Controller
{
    public function addSchool(Request $req){
        $school= new School;
        $school->name= $req->name;
        $school->phone_number= $req->phone_number;
        $school->street1= $req->street1;
        $school->street2= $req->street2;
        $school->county_id= $req->county_id;
        $school->save();
        return $school;

    }
    public function getSchools(){
        $result = School::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')->get();
        $result = School::select('name','street1','street2','phone_number', 'id')->get();
        $result = $result->values()->all();
        return $result;     
    }
    public function updateSchool(Request $req){
        $school = School::find($req->id);
        $school->id=$req->id;
        $school->name= $req->name;
        $school->phone_number= $req->phone_number;
        $school->street1= $req->street1;
        $school->street2= $req->street2;
        $school->county_id= $req->county_id;
        $school->save();
        return $school;     
    }
   
    public function getSchoolsForResidents($user_id){
        // return UserBenefit::select('userId','Schools.name')
        // ->rightJoin('Schools', 'UserBenefits.benefit_id', '=', 'Schools.id')
        // ->where('UserBenefits.user_id', $user_id)
        // ->groupBy('Schools.name','UserBenefits.user_id')
        // ->get();
        return UserBenefit::select('UserBenefits.user_id', 'Schools.id', 'Schools.name')
        ->rightJoin('Schools',function($join)use ($user_id) {
            $join->on('UserBenefits.benefit_id','=','Schools.id')
            ->where('UserBenefits.user_id','=',$user_id)
            ->where('UserBenefits.benefit_type','=','Schools');
        })
        ->groupBy('UserBenefits.user_id', 'Schools.id', 'Schools.name')
        ->get();
    }
    public function getSchoolsForInspectors($county_id){
        $result = School::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('county_id', $county_id)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }
    

    public function getSchoolById($id){
        return School::find($id);
    }

    public function deleteSchoolById($id){
        $school= School::find($id);
        $school->delete();
        return 'School deleted successfully';
    }
    public function getSchoolReportForResidents($user_id){
        return UserBenefit::select('Schools.name as Name')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Schools','UserBenefits.benefit_id','=','Schools.id')
        ->where('Users.id','=',$user_id)
        ->where('UserBenefits.benefit_type','=','Schools')
        ->groupBy('Schools.name')
        ->get();
    }
    public function getSchoolReport(){
        return UserBenefit::selectRaw('count(Users.id) as Number_of_Residents_registered,Schools.name as Name,UserBenefits.id')
        ->leftJoin('Users','UserBenefits.user_id','=','Users.id')
        ->leftJoin('Schools','UserBenefits.benefit_id','=','Schools.id')
        ->where('UserBenefits.benefit_type','=','Schools')
        ->groupBy('Schools.id','Schools.name','Users.id','UserBenefits.id')
        ->get();
    }
    public function getSchoolReportForInspectors($county_id){
        return UserBenefit::selectRaw('count(Users.id) as Number_of_Residents_registered,Schools.name as Name,UserBenefits.id')
        ->leftJoin('Users','UserBenefits.user_id','=','Users.id')
        ->rightJoin('Schools',function($join)use ($county_id) {
            $join->on('UserBenefits.benefit_id','=','Schools.id')
            ->where('Schools.county_id','=',$county_id);   
        })
        ->groupBy('Schools.id','Schools.name','Users.id','UserBenefits.id')
        ->get();
    }
}
