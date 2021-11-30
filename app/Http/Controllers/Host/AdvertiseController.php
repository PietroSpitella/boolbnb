<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Advertise;
use App\Apartment;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $apartments = Apartment::where('user_id', $user_id)->get();
        return view('host.apartments.advertises.index', compact('apartments'));
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
        $form_adv = $request->all();
        $timestamp = now()->timestamp;
        $form_adv['start_date'] = $timestamp;
        $duration = 0;
        if($request->advertise_id === '1') {
            $duration = (24*60*60);
        }
        if($request->advertise_id === '2') {
            $duration = (72*60*60);
        }
        if($request->advertise_id === '3') {
            $duration = (144*60*60);
        }
        $end_date = $timestamp + $duration;
        $form_adv['end_date'] = $end_date;
        

        $advertise = Advertise::find('advertise_id');
        
        if(array_key_exists('apartment', $form_adv)) {
            $advertise->apartment()->attach($form_adv['apartment']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertises = Advertise::all();
        $apartment = Apartment::where('id', $id)->get();
        return view('host.apartments.advertises.create', compact('advertises','apartment'));
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
