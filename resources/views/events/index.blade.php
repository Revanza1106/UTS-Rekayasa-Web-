@extends('layouts.app')

@section('title', 'Jelajahi acara komunitas — RuangTemu')

@section('content')
    <section class="hero-section">
        <div class="container hero-grid">
            <div class="hero-copy">
                <div class="eyebrow"><span class="eyebrow-dot"></span> Tempat orang-orang bertemu</div>
                <h1>Rencana seru<br>dimulai <span>dari sini.</span></h1>
                <p class="hero-description">Temukan kegiatan lokal, kenalan dengan komunitas baru, dan isi akhir pekanmu dengan cerita yang ingin dibagikan.</p>
                <a href="#acara" class="button button-dark">Jelajahi acara <span aria-hidden="true">↓</span></a>
                <div class="hero-social-proof">
                    <div class="avatar-stack" aria-hidden="true"><span>✳</span><span>☻</span><span>♬</span></div>
                    <span><strong>{{ $eventCount }} acara</strong> sedang menunggu teman baru</span>
                </div>
            </div>
            <div class="hero-art" aria-label="Ilustrasi berbagai kegiatan komunitas">
                <div class="art-orbit orbit-one"></div>
                <div class="art-orbit orbit-two"></div>
                <div class="art-card art-card-main">
                    <span class="art-sticker">KETEMU<br>DI SINI!</span>
                    <div class="art-sun"></div>
                    <div class="art-person person-one"><i></i><b></b></div>
                    <div class="art-person person-two"><i></i><b></b></div>
                    <div class="art-person person-three"><i></i><b></b></div>
                    <div class="art-ground"></div>
                    <div class="art-caption"><span>komunitas</span><strong>bareng-bareng</strong></div>
                </div>
                <span class="art-spark spark-one">✳</span>
                <span class="art-spark spark-two">✳</span>
                <span class="art-note">banyak hal<br>seru di sekitar</span>
            </div>
        </div>
        <div class="hero-bottom container">
            <span>Temukan yang kamu suka</span>
            <span class="hero-bottom-line"></span>
            <span>Jakarta & sekitarnya <span aria-hidden="true">⌄</span></span>
        </div>
    </section>

    <section class="events-section" id="acara">
        <div class="container">
            <div class="section-heading">
                <div>
                    <div class="eyebrow"><span class="eyebrow-dot"></span> Kalender komunitas</div>
                    <h2>Ada ruang untuk<br><span>hal yang kamu suka.</span></h2>
                </div>
                <p class="section-description">Dari gerak pagi sampai obrolan malam—pilih satu, lalu ajak teman baru.</p>
            </div>

            <form action="{{ route('events.index') }}" method="GET" class="search-form" role="search">
                <label class="search-box">
                    <span aria-hidden="true">⌕</span>
                    <input type="search" name="q" value="{{ $search }}" placeholder="Cari acara, komunitas, atau lokasi..." aria-label="Cari acara, komunitas, atau lokasi">
                </label>
                <button class="button button-purple" type="submit">Cari acara <span aria-hidden="true">↗</span></button>
            </form>

            <div class="results-heading">
                <p>@if ($search !== '') Hasil pencarian untuk <strong>“{{ $search }}”</strong> @else <strong>Acara pilihan</strong> untukmu @endif</p>
                <span>{{ $events->total() }} acara</span>
            </div>

            @if ($events->count())
                <div class="row event-grid">
                    @foreach ($events as $event)
                        <div class="col-md-6 col-lg-4 mb-4">
                            @include('events._card', ['event' => $event])
                        </div>
                    @endforeach
                </div>

                @if ($events->hasPages())
                    <nav class="pagination-wrap" aria-label="Navigasi halaman acara">
                        @if ($events->onFirstPage())
                            <span class="page-control disabled">← Sebelumnya</span>
                        @else
                            <a class="page-control" href="{{ $events->previousPageUrl() }}">← Sebelumnya</a>
                        @endif
                        <span class="page-current">{{ $events->currentPage() }} <i>/</i> {{ $events->lastPage() }}</span>
                        @if ($events->hasMorePages())
                            <a class="page-control" href="{{ $events->nextPageUrl() }}">Berikutnya →</a>
                        @else
                            <span class="page-control disabled">Berikutnya →</span>
                        @endif
                    </nav>
                @endif
            @else
                <div class="empty-state">
                    <span class="empty-icon">⌕</span>
                    <h3>Belum menemukan acara yang cocok.</h3>
                    <p>Coba kata kunci atau lokasi lain, ya.</p>
                    <a class="button button-dark" href="{{ route('events.index') }}">Lihat semua acara</a>
                </div>
            @endif
        </div>
    </section>

    <section class="community-banner">
        <div class="container community-banner-inner">
            <div><span class="banner-kicker">YANG BIKIN KOTA TERASA DEKAT</span><h2>Datang sebagai orang baru.<br>Pulang membawa cerita.</h2></div>
            <span class="banner-flower" aria-hidden="true">✳</span>
            <a class="button button-light" href="#acara">Cari teman kegiatan <span aria-hidden="true">↗</span></a>
        </div>
    </section>
@endsection
