<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;


class FlightController extends Controller
{
    //
    public function index(){
        foreach (Flight::all() as $flight) {
            echo $flight->name;
        }
    }

    public function additional_constraints(){

        $flights = Flight::where('active', 1)
               ->orderBy('name')
               ->take(10)
               ->get();

    }

    public function fresh(){
         

        $flight = Flight::where('number', 'FR 900')->first();

        $freshFlight = $flight->fresh();
    }

    public function refresh(){
        $flight = Flight::where('number', 'FR 900')->first();

        $flight->number = 'FR 456';

        $flight->refresh();

        $flight->number; // "FR 900"
    }

    public function collection(){
        $flights = Flight::where('destination', 'Paris')->get();


        
        foreach ($flights as $flight) {
            echo $flight->name;
        }


        $flights = $flights->reject(function ($flight) {
            return $flight->cancelled;
        });

    }


    public function chunk(){
        Flight::chunk(200, function ($flights) {
            foreach ($flights as $flight) {
                //
            }
        });

        Flight::where('departed', true)
        ->chunkById(200, function ($flights) {
            $flights->each->update(['departed' => false]);
        }, $column = 'id');
    }



}
