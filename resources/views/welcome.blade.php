@extends('layouts/layout')
@section('content')
    <div class="jumbotron text-center">
        Laratter

    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
        </ul>
    </nav>
    </div>

    <div class="row">
        @forelse($messages as $message)
            <div class="col-md-6">
            <img src="{{$message['image']}}" alt="" class="img-thumbnail">
            <p class="card-text">
                {{ $message['content'] }}
            <a href="/mesagges/{{$message['id']}}">Leer mas</a>
            </p>
            </div>
        @empty
        No hay mensajes destacados
        @endforelse
    </div>
@stop