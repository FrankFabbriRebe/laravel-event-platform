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
        $data = $request -> all();
        
        $event = new Event;

        $event -> name = $data['name'];
        $event -> creation_date = $data['creation_date'];
        $event -> location = $data['location'];
        $event -> description = $data['description'];

        $event -> save();

        $event -> tags() -> attach($data['tags']);
        
        return redirect() -> route('pages.show', $event -> id);
    }

}
