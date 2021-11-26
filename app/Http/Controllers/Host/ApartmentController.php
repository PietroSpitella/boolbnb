<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Apartment;
use App\Service;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
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
        return view('host.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('host.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            //Required
            "title" => "required|max:255",
            "description" => "required",
            "n_rooms" => "required|numeric",
            "n_beds" => "required|numeric",
            "n_baths" => "required|numeric",
            "n_guests" => "required|numeric",
            "pet" => "required",
            "h_checkin" => "required",
            "h_checkout" => "required",
            "image" => "required|image",
            "city" => "required",
            "street" => "required",
            //"services" => "exists:services,id",

            //da modificare lat e long con tomtom
            "lat" => "required|numeric",
            "long" => "required|numeric",
            "house_number" => "required",
            //Nullable
            "type" => "nullable",
            "mq" => "nullable|numeric",
            "price_night" => "nullable|numeric"
        ]);
    
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
        //Fino a qui creo solo l'appartamento con tutti i valori delle colonne ma senza assegnargli l'id
        $new_apartment->save();
        //Faccio qui l'attach perchè dopo il salvataggio l'appartamento avrà l'id assegnato a cui dobbiamo collegare gli id dei servizi 
        
        //$new_apartment->services()->attach($form_data_apartment['services']);
        if(array_key_exists('services', $form_data_apartment)) {
            $new_apartment->services()->attach($form_data_apartment['services']);
        } else {
            $new_apartment->services()->attach([]);
        }
         
        return redirect()->route('host.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        if(!$apartment) {
            abort(404);
        }
        return view('host.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        if(!$apartment) {
            abort(404);
        }
        $services = Service::all();
        return view('host.edit', compact('apartment','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            //Required
            "title" => "required|max:255",
            "description" => "required",
            "n_rooms" => "required|numeric",
            "n_beds" => "required|numeric",
            "n_baths" => "required|numeric",
            "n_guests" => "required|numeric",
            "pet" => "required",
            "h_checkin" => "required",
            "h_checkout" => "required",
            "image" => "nullable|image",
            "city" => "required",
            "street" => "required",
            //da modificare lat e long con tomtom
            "lat" => "required|numeric",
            "long" => "required|numeric",
            "house_number" => "required",
            //Nullable
            "type" => "nullable",
            "mq" => "nullable|numeric",
            "price_night" => "nullable|numeric"
        ]);
        $form_data_apartment = $request->all();
        if(array_key_exists('image', $form_data_apartment)){
            Storage::delete($apartment->image);
            $img_path = Storage::put('apartment_image', $form_data_apartment['image']);
            $form_data_apartment['image'] = $img_path;
        }
        
        if($form_data_apartment != $apartment->title) {
            //Creazione slug
            $slug = Str::slug($form_data_apartment['title'], '-');
            $slug_apartment = Apartment::where('slug', $slug)->first();
            //il ciclo inizia se lo slug è gia presente
            $i= 1;
            while($slug_apartment) {
                $slug = $slug . '-' . $i;
                $slug_apartment = Apartment::where('slug', $slug)->first();
                $i++;
            }
            
            //Dobbiamo inviare il nuovo slug, quindi bisogna sovracrivere la proprietà slug
            
            $form_data_apartment['slug'] = $slug;
        }

        //Per inviare i dati utilizzo il metodo update
        $apartment->update($form_data_apartment);
        
       
        if(array_key_exists('services', $form_data_apartment)) {
            $apartment->services()->sync($form_data_apartment['services']);
        } else {
            $apartment->services()->sync([]);
        }
       
        return redirect()->route('host.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('host.apartments.index');
    }
}
