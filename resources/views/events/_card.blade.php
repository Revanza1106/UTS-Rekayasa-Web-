<article class="event-card">
    <a href="{{ route('events.show', $event) }}" class="event-image-link" aria-label="Lihat detail {{ $event->name }}">
        <img class="event-image" src="{{ asset('assets/images/'.$event->banner) }}" alt="Poster acara {{ $event->name }}" loading="lazy">
        <span class="image-arrow" aria-hidden="true">↗</span>
    </a>
    <div class="event-card-body">
        <div class="event-card-meta">
            <span class="event-date"><span aria-hidden="true">▦</span> {{ $event->formattedDate() }}</span>
            <span class="event-time">{{ $event->formattedTime() }}</span>
        </div>
        <h3><a href="{{ route('events.show', $event) }}">{{ $event->name }}</a></h3>
        <p class="event-organizer">Oleh {{ $event->organizer }}</p>
        <p class="event-location"><span aria-hidden="true">⌖</span> {{ $event->location }}</p>
        <div class="event-card-bottom">
            <span class="ticket-price">
                @if ((float) $event->ticket_price === 0.0)
                    Gratis
                @else
                    Rp{{ number_format((float) $event->ticket_price, 0, ',', '.') }}
                @endif
            </span>
            <a class="text-link" href="{{ route('events.show', $event) }}">Lihat detail <span aria-hidden="true">→</span></a>
        </div>
    </div>
</article>
