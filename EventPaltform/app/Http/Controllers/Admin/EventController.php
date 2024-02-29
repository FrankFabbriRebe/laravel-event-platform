<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Tag;
use App\Models\Event;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class EventController extends Controller
{
    public function index()
    {

        $events = Event::all();
        $tags = Tag::all();
        $users = User::all();

        return view('pages.dashboard', compact('users', 'tags', 'events'));
    }
    public function show($id)
    {
        $event = Event::find($id);

        return view('pages.show', compact('event'));
    }

    public function create()
    {

        $tags = Tag::all();

        return view('pages.create', compact("tags"));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $tag = Tag::find($data['tag_id']);

        $newEvent = new Event();

        $newEvent->name = $data['name'];
        $newEvent->description = $data['description'];
        $newEvent->date = $data['date'];
        $newEvent->location = $data['location'];

        $newEvent->save();

        $newEvent->tags()->attach($data['tag_id']);

        return redirect()->route('users.index');

    }

}
