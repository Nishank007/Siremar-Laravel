<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\UserBenefit;

class FlightController extends Controller
{
    public function addFlight(Request $req){
        $Flight= new Flight;
        $Flight->airlines_name= $req->airlines_name;
        $Flight->date_of_departure= $req->date_of_departure;
        $Flight->flight_number= $req->flight_number;
        $Flight->flight_time= $req->flight_time;
        $Flight->destination= $req->destination;
        $Flight->county_id= $req->county_id;
        $Flight->benefits= $req->benefits;
        $Flight->save();
        return $Flight;

    }
    public function getFlights(){
        $result = Flight::selectRaw('airlines_name as Name, id')->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function updateFlight(Request $req){
        $Flight = Flight::find($req->id);
        $Flight->id=$req->id;
        $Flight->airlines_name= $req->airlines_name;
        $Flight->date_of_departure= $req->date_of_departure;
        $Flight->flight_number= $req->flight_number;
        $Flight->flight_time= $req->flight_time;
        $Flight->destination= $req->destination;
        $Flight->county_id= $req->county_id;
        $Flight->benefits= $req->benefits;
        $Flight->save();
        return $Flight;  
    }

    public function getFlightsForResidents($user_id){
        return UserBenefit::select('UserBenefits.user_id', 'Flights.id', 'Flights.airlines_name as Name')
        ->rightJoin('Flights',function($join)use ($user_id) {
            $join->on('UserBenefits.benefit_id','=','Flights.id')
            ->where('UserBenefits.user_id','=',$user_id)
            ->where('UserBenefits.benefit_type','=','Flights');
        })
        ->groupBy('UserBenefits.user_id', 'Flights.id', 'Flights.airlines_name')
        ->get();
    }

    public function getFlightsForInspectors($county_id){
        $result = Flight::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('county_id', $county_id)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }
    

    public function getFlightById($id){
        return Flight::find($id);
    }

    public function deleteFlightById($id){
        $Flight= Flight::find($id);
        $Flight->delete();
        return 'Flight deleted successfully';
    }
    public function getFlightReportForResidents($user_id){
        return UserBenefit::select('Flights.airlines_name as Name')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Flights','UserBenefits.benefit_id','=','Flights.id')
        ->where('Users.id','=',$user_id)
        ->where('UserBenefits.benefit_type','=','Flights')
        ->groupBy('Flights.airlines_name')
        ->get();
    }
    public function getFlightReport(){
        return UserBenefit::selectRaw('count(Users.id) as Number_of_Residents_registered,Flights.airlines_name as Name,UserBenefits.id')
        ->leftJoin('Users','UserBenefits.user_id','=','Users.id')
        ->leftJoin('Flights','UserBenefits.benefit_id','=','Flights.id')
        ->where('UserBenefits.benefit_type','=','Flights')
        ->groupBy('Flights.id','Flights.airlines_name','Users.id','UserBenefits.id')
        ->get();
    }
}
