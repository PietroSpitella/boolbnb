<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
    public function searchApartment(Request $request){
        function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $decimals = 2) {
            // Calculate the distance in degrees
            $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
    
            // Convert the distance in degrees to km
            $distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
            return round($distance, $decimals);
        };

        $resQuery = $request->query();
        
        $filteredApartments = Apartment::where('n_rooms', '>=', $resQuery['n_rooms'] ?? 0)
        ->where('n_beds', '>=', $resQuery['n_beds'] ?? 0)
        ->where('n_baths', '>=', $resQuery['n_baths'] ?? 0)
        ->where('n_guests', '>=', $resQuery['n_guests'] ?? 0)
        ->get();

        $rangeDistance = $request->distance;
        $lat = $request->lat;
        $long = $request->long;
        // dd($rangeDistance, $lat, $long );

        $filteredApartmentsByDistance = [];

        // Imposto a 20 perchè è chiesto dal progetto

        foreach($filteredApartments as $apartment){
            $distancePoints = distanceCalculation($lat, $long, $apartment->lat, $apartment->long, 2);

            if($distancePoints < $rangeDistance || ($lat === null && $long === null)){
                $filteredApartmentsByDistance[] = $apartment;
            }elseif($distancePoints < $rangeDistance){
                $filteredApartmentsByDistance[] = $apartment;
            }
        };

        

        return response()->json([
            'success' => true,
            "results" => $filteredApartmentsByDistance
        ]);
    }
}
