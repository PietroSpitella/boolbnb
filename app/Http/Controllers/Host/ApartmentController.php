<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Apartment;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('host.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('host.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data_apartment = $request->all();

        //Verifico se l'immagine è stata caricata
        if(array_key_exists('image', $form_data_apartment)){
            $img_path = Storage::put('apartment_image', $form_data_apartment['image']);
            $form_data_apartment['image'] = $img_path;
        }
        $new_apartment = new Apartment();
        $new_apartment->fill($form_data_apartment);

        //Creazione slug
        $slug = Str::slug($new_apartment->title, '-');
        $slug_apartment = Apartment::where('slug', $slug)->first();
        //il ciclo inizia se lo slug è gia presente
        $i= 1;
        while($slug_apartment) {
            $slug = $slug . '-' . $i;
            $slug_apartment = Apartment::where('slug', $slug)->first();
            $i++;
        }
        $new_apartment->slug = $slug;

        
        
        $new_apartment->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('host.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('host.edit');
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
