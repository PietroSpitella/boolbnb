<?php

namespace App\Http\Controllers\Host;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
class HomeController extends Controller
{
    public function index(){
        return view('host.home');
    }

    public function listMessage(){
        $messages = Message::all();
        $apartments = Apartment::all();
        return view('host.messages.index', compact('messages'));
    }
}
