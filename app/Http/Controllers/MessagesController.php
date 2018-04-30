<?php

namespace App\Http\Controllers;
use App\Message;

use Illuminate\Http\Request;


class MessagesController extends Controller
{
    public function show(Message $message) {//para que funcione el metodo Route Model Binding el parametro recibido entre {} de la ruta en routes debe tener el mismo nombre que el que estamos pasando en la funcion que se le pasa al controlador como parametro
        //ir a vuscar el message por id
        
        //Una view de un message
        return view('messages.show', [
            'message'=> $message,
        ]);
    }

    public function create(Request $request){
        dd($request->all());

        return 'create';
    }
}
