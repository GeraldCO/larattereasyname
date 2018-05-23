<?php

namespace App\Http\Controllers;
use App\Message;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;
use Cloudder;



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
        Cloudder::upload($request->file('image'));
        $result=Cloudder::getResult();
        $url=$result['url'];

        $message= Message::create([
            'user_id'=> $user->id,
            'content' => $request->input('message'),
            'image'=> $url,
        ]);        
        return redirect('/messages/'.$message->id);
    }

    public function search(Request $request){
        $query = $request->input('query');
        //$messages= Message::with('user')->where('content',  'LIKE', "%$query%")->get();     //esta linea la reemplazamos por las busquedas con algolia y search
        $messages= Message::search($query)->get();
        $messages->load('user');
        return  view('messages.index', [
            'messages'=>$messages
        ]);
    }

    public function responses(Message $message){
        return $message->responses;
    }
}
