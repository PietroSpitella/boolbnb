<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
class ApartmentController extends Controller
{
    public function searchApartment(Request $request){



        $resQuery = $request->query();

        $apartments = Apartment::where($resQuery)->get();

        // $apartments = Apartment::where('n_baths', '>=', $resQuery['n_baths'])
        //                         ->where('n_guests', '>=', $resQuery['n_guests'])
        //                         ->where('n_rooms', '>=', $resQuery['n_rooms'])
        //                         ->where('n_beds', '>=', $resQuery['n_beds'])
        //                         ->get();


        return response()->json([
            'success' => true,
            "results" => $apartments
        ]);
    }
}
