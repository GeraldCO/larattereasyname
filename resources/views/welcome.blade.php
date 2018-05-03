@extends('layouts.app')
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
        <form action="/message/create" method="post" enctype="multipart/form-data">
            <div class="form-group">
                {{ csrf_field() }}

                <input type="file" name="image">
                
                <input type="text" name="message" class="form-control @if($errors->has('message')) is-invalid @endif" placeholder="Que estas pensando?"/>
                @if ($errors->any())
                    @foreach ($errors->get('message') as $error) <!-- en todos los pedidos tenemos una variable errors que es una variable que contiene una variable de tipo message value-->
                    <div class="invalid-feedback"> {{$error}} </div>
                    @endforeach
                @endif
                
            </div>
        </form>
    </div>
    <div class="row">
        @forelse($messages as $message)
            <div class="col-md-6">
            @include('messages.message')
            </div>
        @empty
            No hay mensajes destacados
        @endforelse
        @if(count($messages))
        <div class="mt-2 mx-auto">
            {{$messages->links('
                pagination::bootstrap-4
            ') }}
        </div>
        @endif
    </div>
@stop