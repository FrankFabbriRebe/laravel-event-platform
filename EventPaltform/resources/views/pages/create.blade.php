@extends('layouts.app')

@section('content')
 <h1 class="text-center m-4">Create new event</h1>

 <form action="{{route('event.store')}}"
       method="POST">
       @csrf
       @method('POST')
    <div class="container border p-3">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-xl-3">
                <label for="name">Event's name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="col-sm-12 col-md-4 col-xl-3">
                <label for="description">Description</label>
                <input type="text" name="description" id="description">
            </div>
            <div class="col-sm-12 col-md-4 col-xl-3">
                <label for="creation_date">Creation date</label>
                <input type="date" name="creation_date" id="creation_date">
            </div>
            <div class="col-sm-12 col-md-4 col-xl-3">
                <label for="location">Location</label>
                <input type="text" name="location" id="location">
            </div>
            <div class="col-sm-12 col-md-4 col-xl-3">
                
            </div>
            <div class="col-sm-12 col-md-4 col-xl-3">
                
            </div>
        </div>
        <input onclick="return confirm('Fields data are correct?')" class="btn btn-primary my-3" type="submit" value="Create">
    </div>
 </form>
@endsection