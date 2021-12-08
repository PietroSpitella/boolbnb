<?php

namespace App\Http\Controllers\Host;
use App\Apartment;
use App\Statistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function statistics(Apartment $apartment)
    {
        // if(!$apartment) {
        //     abort(404);
        // }elseif(Auth::user()->id !== $apartment->user_id){
        //     return redirect()->back();
        // }
        $apartment = Apartment::find($apartment);
        return view('host.apartments.statistics', compact('apartment'));
    }
}
