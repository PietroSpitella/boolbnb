<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Service;

class ApartmentController extends Controller
{
    public function searchApartment(Request $request){

        // Funzione per calcolare la distanza tra due punti sulla terra
        function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $decimals = 2) {
            // Calculate the distance in degrees
            $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
    
            // Convert the distance in degrees to km
            $distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
            return round($distance, $decimals);
        };

        // Mi salvo la query in una variabile
        $resQuery = $request->query();
        $ids = explode(',', $request->services);

        // Creo il primo filtro in base a ciò che mi viene passato dalla query. Se non mi viene passato nessun valore lo inizializzo io con 0
        $filteredApartments = Apartment::where('n_rooms', '>=', $resQuery['n_rooms'] ?? 0)
        ->where('n_beds', '>=', $resQuery['n_beds'] ?? 0)
        ->where('n_guests', '>=', $resQuery['n_guests'] ?? 0)
        ->get();


        if(!empty($request->services)){
            $filteredApartments = Apartment::whereHas('services', function($q) use($ids){
                $q->whereIn('service_id', $ids);
            })->get();
        }

        // Salvo la distanza passata dal range input
        $rangeDistance = $request->distance;

        // Salvo la lat e long della città cercata dall'utente e se non c'è imposto quella di una città (in questo caso Torino)
        $lat = $request->lat ?? 45.07049;
        $long = $request->long ?? 7.68682;

        // Controllo tramite un foreach che i singoli appartamenti che si sono salvati dal primo filtro risultino nel raggio della distanza che ha inserito l'utente
        $filteredApartmentsByDistance = [];
        foreach($filteredApartments as $apartment){
            $distancePoints = distanceCalculation($lat, $long, $apartment->lat, $apartment->long, 2);

            if($distancePoints < $rangeDistance || ($lat === null && $long === null)){
                $filteredApartmentsByDistance[] = $apartment;
            }
        };

        $services = Service::all();
        // $idsServices = [];
        // foreach($services as $service){
        //     $idsServices[] = $service->id;
        // };
        // dd($idsServices);
        // $ids = $resQuery['services'];

        // $filteredApartments->whereHas('apartment_service', function($q) use($ids){
        //     $q -> whereIn('service_id', [$ids]);
        // })->get();

        // dd($resQuery['services']);
        // $defApartments = [];
        // $id = $resQuery['services'];
        // $filteredApartmentsByDistance->whereHas('apartment_service', function($q) use($id){
        //     $q -> whereIn('service_id', $id);
        // });

        return response()->json([
            'success' => true,
            "results" => $filteredApartmentsByDistance,
            'services' => $services
        ]);
    }
}
