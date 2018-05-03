<?php

namespace App\Http\Controllers;
use App\Message;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;


class MessagesController extends Controller
{
    public function show(Message $message) {//para que funcione el metodo Route Model Binding el parametro recibido entre {} de la ruta en routes debe tener el mismo nombre que el que estamos pasando en la funcion que se le pasa al controlador como parametro
        //ir a vuscar el message por id
        
        //Una view de un message
        return view('messages.show', [
            'message'=> $message,
        ]);
    }

    public function create(CreateMessageRequest $request)
    {
        $user = $request->user();
        $image = $request->file('image');

        $message= Message::create([
            'user_id'=> $user->id,
            'content' => $request->input('message'),
            'image'=> $image->store('messages', 'public'),
        ]);        
        return redirect('/messages/'.$message->id);
    }
}
