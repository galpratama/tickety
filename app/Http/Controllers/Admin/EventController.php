<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $events = Event::paginate(10);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('admin.events.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request): RedirectResponse
    {
        // Create slug
        $request->merge([
            'slug' => Str::slug($request->name),
        ]);

        // Create event
        Event::create($request->all());

        // Return to index
        return redirect()->route('admin.events.index')->with('success', 'Event created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): RedirectResponse
    {
        return redirect()->route('admin.events.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event): View
    {
        $categories = Category::all();

        return view('admin.events.form', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id): RedirectResponse
    {
        // Create slug
        $request->merge([
            'slug' => Str::slug($request->name),
        ]);

        // Update event
        Event::find($id)->update($request->all());

        // Return to index
        return redirect()->route('admin.events.index')->with('success', 'Event updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): RedirectResponse
    {
        // Delete event
        $event->delete();

        // Return to index
        return redirect()->route('admin.events.index')->with('success', 'Event deleted');
    }
}
