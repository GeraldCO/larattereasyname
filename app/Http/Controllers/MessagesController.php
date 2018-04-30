<?php

namespace App\Http\Controllers;
use App\Message;

use Illuminate\Http\Request;


class MessagesController extends Controller
{
    public function show(Message $message) {
        //ir a vuscar el message por id
        
        //Una view de un message
        return view('messages.show', [
            'message'=> $message,
        ]);
    }
}
