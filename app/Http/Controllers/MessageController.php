<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'apartment_id'=>'required',
            'fullname'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        $apartment_id = $request->apartment_id;
        $message_data = $request->all();
        $new_message = new Message();
        $new_message->fill($message_data);
        $new_message->save();
        return redirect()->route('apartments.show', $apartment_id)->with('sent', 'Il messaggio è stato correttamente inviato');
    }
}
