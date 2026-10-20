<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));

        $events = Event::query()
            ->when($search !== '', function ($query) use ($search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('organizer', 'like', "%{$search}%")
                        ->orWhere('location', 'like', "%{$search}%");
                });
            })
            ->orderBy('date')
            ->orderBy('time')
            ->paginate(6)
            ->withQueryString();

        return view('events.index', [
            'events' => $events,
            'search' => $search,
            'eventCount' => Event::count(),
        ]);
    }

    public function show(Event $event): View
    {
        $moreEvents = Event::query()
            ->where('id', '!=', $event->getKey())
            ->whereDate('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->limit(3)
            ->get();

        return view('events.show', compact('event', 'moreEvents'));
    }
}
