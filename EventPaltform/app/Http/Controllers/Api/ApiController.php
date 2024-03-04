<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Tag;

class ApiController extends Controller
{
    public function getTest() {
        return response()->json([
            'status' => 'success',
            'message' => 'message test'
        ]);
    }
    public function getEvents(){
        $events = Event :: all();

        return response() -> json([
            'status' => 'success',
            'events' => $events
        ]);
    }
    public function getTags(){
        $tags = Tag :: all();

        return response() -> json([
            'status' => 'success',
            'tags' => $tags
        ]);
    }
}
