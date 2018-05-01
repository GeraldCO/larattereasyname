<img src="{{$message->image}}" alt="" class="img-thumbnail">
<p class="card-text">
    <span class="text-muted"> Escrito por <a href="/{{ $message->user->username }}">{{$message->user->name}}</a> </span>
    {{ $message->content }}
<a href="/messages/{{$message->id}}">Leer mas</a>
</p>
<div class="card-text text-muted float-right">
    {{ $message->created_at }}
</div>