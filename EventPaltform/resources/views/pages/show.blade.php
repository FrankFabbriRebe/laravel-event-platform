@extends('layouts.app')

@section('content')
<h1 class="text-center my-4">Show event: {{$event->id}}</h1>
<div class="container border p-3">
    <div class="text-center">
        <h1><strong>Event name: </strong>{{$event->name}}</h1>
        <ul>
            <li><strong>Event's date: </strong>{{$event->date}}</li>
            <li><strong>Description: </strong>{{$event->description}}</li>
            <li><strong>Location: </strong>{{$event->location}}</li>
        </ul>
        <ul>
            @foreach ($event->tags as $tag)
                <li>#{{$tag->name}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection