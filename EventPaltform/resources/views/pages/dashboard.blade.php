@extends('layouts.app')

@section('content')
<h1 class="text-center">Events {{count($events)}}</h1>

<div class="container">
    <!-- link to get create page -->
<a href="{{route('users.create')}}">Click here to add a new event</a>
    <div class="row">
        @foreach ($events as $event)
            <div class="col-sm-12 col-md-6 col-xl-3 p-3">
                <div class="container border higth">
                    <a class="anchor_index" href="{{route('users.show', $event->id)}}">
                        <h5>{{$event->name}}</h5>
                        <h5>{{$event->location}}</h5>
                        <span>Description: </span><p>
                            {{$event->description}}
                        </p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

