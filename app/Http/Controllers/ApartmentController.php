<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $name = $request->input('id');
        //dump($name);
        /* PRIMA SOLUZIONE DA CUI PARTIRE
        $apartments_filter = DB::table('apartment_service')
        ->where('service_id', '=', $name)
        ->get()
        ;
        dump($apartments_filter);
       */

        $deck_table = DB::table('apartments')
        ->join('apartment_service','apartments.id', '=', 'apartment_service.apartment_id')
        ->join('services', 'apartment_service.service_id', '=', 'services.id')
        ->where('service_id', '=', $name)
        ->get()
        ;
        $filter_apartment_service = [];
        for($i = 0; $i < count($deck_table); $i++) {
            $apartments_filter = $deck_table[$i];
            array_push($filter_apartment_service, $apartments_filter);
        }
 
        dump($filter_apartment_service);
     
        //$apartments = Apartment::all();
        $services = Service::all();
        return view('search', compact('filter_apartment_service','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $apartment = Apartment::where('id', $id)->first();
        if(!$apartment){
            abort(404);
        }

        $services = Service::all();


        $services = Service::all();


        return view('show', compact('apartment', 'user', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
