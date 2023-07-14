<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    /**
     * Display the details of an event.
     *
     * @param  Request  $request
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function index(Request $request, $slug): View
    {
        $event = Event::fetch($slug);

        return view('frontend.details', compact('event'));
    }
}
