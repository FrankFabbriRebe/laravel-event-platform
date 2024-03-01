@extends('layouts.app')

@section('content')
<h1 class="text-center">Events {{count($events)}}</h1>

<div class="container text-center">
    <!-- link to get create page -->
@auth
    <button class="btn btn-primary m-3"><a class="text-white" href="{{route('users.create')}}">Click here to add a new event</a></button>   
@endauth
    <div class="row text-start">
        @foreach ($events as $event)
            <div class="col-sm-12 col-md-6 col-xl-3 p-2">
                <div class="container border higth">
                    <a class="anchor_index" href="{{route('users.show', $event->id)}}">
                        <h5><strong>Name: </strong>{{$event->name}}</h5>
                        <h5><strong>Where: </strong>{{$event->location}}</h5>
                        <span><strong>Description: </strong> </span><p>
                            {{$event->description}}
                        </p>
                    </a>
                    @auth
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary"><a class="text-white" href=""><i class="fa-solid fa-pencil"></i> Edit</a></button>
                            </div>
                            <div class="col">
                                <form action="{{ route('events.destroy', $event->id) }}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form> 
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

