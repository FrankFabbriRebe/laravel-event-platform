@extends('layouts.app')

@section('content')
<h1 class="text-center">Create new event</h1>

<div class="container">

    <form  action="{{ route('users.store') }}" method="POST">

    @csrf
    @method('POST')

    <label for="name">Event's name</label>
    <input type="text" name="name" id="name">

    <br>

    <label for="description">Event's description</label>
    <input type="text" name="description" id="description">

    <br>

    <label for="date">Event's date</label>
    <input type="text" name="date" id="date">

    <br>

    <label for="location">Event's location</label>
    <input type="text" name="location" id="location">

    <br>

    <label for="tag_id">Event's tag</label>
    <select name="tag_id" id="tag_id">
    @foreach ($tags as $tag)
    <option value="{{ $tag->id}}">{{ $tag->name }}</option>
    @endforeach
    </select>

    <br>

    <input type="submit" value="CREATE">

    </form>

</div>

@endsection