@extends('layouts.app')

@section('title', $event->name.' — RuangTemu')

@section('content')
    <section class="detail-section">
        <div class="container">
            <a href="{{ route('events.index') }}#acara" class="back-link"><span aria-hidden="true">←</span> Kembali ke semua acara</a>
            <div class="row detail-layout">
                <div class="col-lg-7 detail-main">
                    <img class="detail-banner" src="{{ asset('assets/images/'.$event->banner) }}" alt="Poster acara {{ $event->name }}">
                    <div class="detail-kicker"><span class="eyebrow-dot"></span> Acara komunitas</div>
                    <h1 class="detail-title">{{ $event->name }}</h1>
                    <p class="detail-organizer">Dibuat oleh <strong>{{ $event->organizer }}</strong></p>
                    <div class="detail-description">
                        <h2>Tentang acara ini</h2>
                        <p>{{ $event->description }}</p>
                    </div>
                </div>
                <aside class="col-lg-5 detail-aside">
                    <div class="info-card">
                        <span class="info-label">CATAT DI KALENDER</span>
                        <h2>Siap ketemu<br>orang baru?</h2>
                        <div class="info-row">
                            <span class="info-icon info-icon-yellow" aria-hidden="true">▦</span>
                            <span><small>Tanggal & waktu</small><strong>{{ $event->formattedDate() }}</strong><strong>{{ $event->formattedTime() }}</strong></span>
                        </div>
                        <div class="info-row">
                            <span class="info-icon info-icon-pink" aria-hidden="true">⌖</span>
                            <span><small>Lokasi</small><strong>{{ $event->location }}</strong></span>
                        </div>
                        <div class="info-row">
                            <span class="info-icon info-icon-green" aria-hidden="true">↗</span>
                            <span><small>Kontribusi tiket</small><strong>@if ((float) $event->ticket_price === 0.0) Gratis @else Rp{{ number_format((float) $event->ticket_price, 0, ',', '.') }} @endif</strong></span>
                        </div>
                        <div class="info-divider"></div>
                        <p class="info-footnote">Datang sendiri? Tenang, banyak teman baru menunggumu di sana.</p>
                        <a href="{{ route('events.index') }}#acara" class="button button-dark button-block">Jelajahi acara lain <span aria-hidden="true">↗</span></a>
                    </div>
                    <div class="organizer-note"><span aria-hidden="true">✳</span><p>Acara ini digerakkan oleh <strong>{{ $event->organizer }}</strong>, bagian dari komunitas lokal yang terbuka untuk semua.</p></div>
                </aside>
            </div>
        </div>
    </section>

    @if ($moreEvents->isNotEmpty())
        <section class="related-section">
            <div class="container">
                <div class="related-heading"><div><div class="eyebrow"><span class="eyebrow-dot"></span> Masih ada cerita lain</div><h2>Ketemu di acara <span>berikutnya.</span></h2></div><a class="text-link" href="{{ route('events.index') }}#acara">Semua acara <span aria-hidden="true">→</span></a></div>
                <div class="row event-grid">
                    @foreach ($moreEvents as $relatedEvent)
                        <div class="col-md-6 col-lg-4 mb-4">@include('events._card', ['event' => $relatedEvent])</div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
