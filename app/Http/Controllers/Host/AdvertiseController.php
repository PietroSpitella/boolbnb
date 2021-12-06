<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
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
        //$user_id = Auth::user()->id;
        //$apartments = Apartment::where('user_id', $user_id)->get();
        //return view('host.apartments.advertises.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertises = Advertise::all();
        $user_id = Auth::user()->id;
        $apartments = Apartment::where('user_id', $user_id)->get();
        return view('host.apartments.advertises.create', compact('advertises','apartments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        //Richiesta dal form
        $form_adv = $request->all();
        //Devo capire come partire da una data e in base al pacchetto scelto, aggiungere le ore

        //Calcolo della data finale;
        if($form_adv['advertise_id'] === '1') {
            $end_date=Date('y:m:d', strtotime("+1 days"));
        } 
        if($form_adv['advertise_id'] === '2') {
            $end_date=Date('y:m:d', strtotime("+3 days"));
        }
        if($form_adv['advertise_id'] === '3'){
            $end_date=Date('y:m:d', strtotime("+6 days"));
        }
        
        //Data di inizio
        $start_date = Date('y:m:d');
        

        //Sponsorizzate Roberto
        //Id appartamento da sponsorizzare
        $apartment_id = (int) $form_adv['apartment_id'];
        $advertise_id = $form_adv['advertise_id'];
        
        //QUESTO è l'appartamento completo che l'utente vuole sponsorizzare
        $apartment = Apartment::find($apartment_id);
        //A questo '$apartment' devo attaccare l'advertise_id
        
        //Invio dei dati al DB (tabella ponte) 
        
        $advTable = DB::table('advertises')
        ->join('advertise_apartment','advertises.id', '=', 'advertise_apartment.advertise_id')
        ->join('apartments', 'advertise_apartment.apartment_id', '=', 'apartments.id')        
        ->get()
        ;
        if((count($advTable) === 0)) {
            $apartment->advertises()->attach($form_adv['advertise_id'], 
            [
                'start_date' => $start_date,
                'end_date' => $end_date,
                'status' => true,
                'transaction_id' => 'transazione avvenuta'
            ]);
        }

        $arr = [];
        for($i = 0; $i < count($advTable); $i++) {
            array_push($arr, $advTable[$i]);
            foreach ($arr as $item) {
                if((($item->apartment_id) !== $apartment_id) && ($start_date <= $end_date) ){
                    $apartment->advertises()->attach($form_adv['advertise_id'], 
                    [
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'status' => true,
                        'transaction_id' => 'transazione avvenuta'
                    ]); 
                }elseif(( ($item->apartment_id) == $apartment_id) && (($item->advertise_id) == $advertise_id) && ($start_date > $end_date)) {
                    $apartment->advertises()->attach($form_adv['advertise_id'], 
                    [
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'status' => true,
                        'transaction_id' => 'transazione avvenuta'
                    ]); 
                }else {
                    dd('esiste');
                }
                
            }
        }

        /*
        if((count($advTable) >= 0)) {
            $apartment->advertises()->attach($form_adv['advertise_id'], 
            [
                'start_date' => $start_date,
                'end_date' => $end_date,
                'status' => true,
                'transaction_id' => 'transazione avvenuta'
            ]);
        }
        
        */
        
        
        
       
        /*
        $apartment->advertises()->attach($form_adv['advertise_id'], 
        [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => true,
            'transaction_id' => 'transazione avvenuta'
        ]);
        */
        
        return redirect()->route('host.apartments.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$advertises = Advertise::all();
        //$apartment = Apartment::where('id', $id)->get();
        //return view('host.apartments.advertises.create', compact('advertises','apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
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
