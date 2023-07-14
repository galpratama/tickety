<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page with events and categories.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $events = $this->fetchEvents();
        $categories = $this->fetchCategories();

        return view('frontend.index', compact('events', 'categories'));
    }

    /**
     * Fetch the events based on the query parameters.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function fetchEvents(): Collection
    {
        $category = request()->query('category');

        $events = Event::upcoming();

        if (!request()->query('all_events')) {
            $events->limit(6);
        }

        if ($category) {
            $events->withCategory($category);
        }

        return $events->get();
    }

    /**
     * Fetch the categories based on the query parameters.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function fetchCategories(): Collection
    {
        $categories = Category::sortByMostEvents();

        if (!request()->query('all_categories')) {
            $categories->limit(4);
        }

        return $categories->get();
    }
}
