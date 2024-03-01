<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use SebastianBergmann\CodeCoverage\Report\Xml\Project;

use App\Models\User;
use App\Models\Tag;
use App\Models\Event;

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
        $users = User::all();

        return view('pages.create', compact("tags", "users"));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $tag = Tag::find($data['tag_id']);

        $event = new Event();

        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->creation_date = $data['creation_date'];
        $event->location = $data['location'];

        $event->save();

        $event->tags()->attach($data['tag_id']);

        $event->users()->attach($data['user_id']);

        return redirect()->route('dashboard');


    }

    public function edit($id)
    {

        $event = Event::find($id);
        $tags = Tag::all();

        return view('pages.edit', compact('event', 'tags'));

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $tags = Tag::find($data['tag_id']);

        $event = Event::find($id);

        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->creation_date = $data['creation_date'];
        $event->location = $data['location'];

        $event->save();

        $event->tags()->sync($data['tag_id']);

        return redirect()->route('users.show', $event->id);
    }

}
