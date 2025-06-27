@extends('layouts.landing')

@section('title', 'Track Your Coffee')

@section('content')
<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .fullscreen-iframe {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        border: none;
        z-index: 0;
    }

    .cta-overlay {
        position: absolute;
        z-index: 1;
        top: 30px;
        right: 30px;
    }

    .btn-coffee {
        background-color: #000;
        color: #d4af37; /* Gold */
        border: 2px solid #d4af37;
        font-weight: bold;
        padding: 10px 24px;
        font-size: 1.1rem;
        border-radius: 8px;
        transition: 0.3s ease-in-out;
    }

    .btn-coffee:hover {
        background-color: #d4af37;
        color: #000;
    }
</style>

<div class="cta-overlay">
    <a href="{{ route('login') }}" class="btn btn-coffee shadow">
        <i class="fas fa-sign-in-alt mr-1"></i> Get Started
    </a>
</div>

<iframe 
    src="https://gamma.app/embed/1xwd11a486vcyw8"
    class="fullscreen-iframe"
    allow="fullscreen"
    title="Track Your Coffee From Bean to Brew">
</iframe>
@endsection
