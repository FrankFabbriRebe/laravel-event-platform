@extends('layouts.app')

@section('content')

<h1>Edit event</h1>

<form
       method="POST">
       @csrf
       @method('POST')

    <div class="container border p-3">
        <div class="row">

            <div class="col-sm-12 col-md-4 col-xl-3">
                <label for="name">Event's name</label>
                <input type="text" name="name" id="name" value="{{ $event->name }}">
            </div>

            <div class="col-sm-12 col-md-4 col-xl-3">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="{{ $event->description }}">
            </div>

            <div class="col-sm-12 col-md-4 col-xl-3">
                <label for="creation_date">Creation date</label>
                <input type="date" name="creation_date" id="creation_date" value="{{ $event->creation_date }}">
            </div>

            <div class="col-sm-12 col-md-4 col-xl-3">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" value="{{ $event->location }}">
            </div>

            <div class="col-sm-12 col-md-4 col-xl-3">
                @foreach ($tags as $tag)

                    <label for="tag_id">{{ $tag->name }}</label>
                    <input type="checkbox" name="tag_id[]" value="{{ $tag->id }}" 
				    @foreach ($event->tags as $pTag)
			            @checked($pTag->id === $tag->id)
                    @endforeach
  >
                @endforeach
            </div>

            

        </div>
        <input onclick="return confirm('Fields data are correct?')" class="btn btn-primary my-3" type="submit" value="Create">
    </div>
 </form>

@endsection