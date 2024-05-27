@extends('layouts/contentNavbarLayout')

@section('title', 'Library - My Games')

@section('content')
    <h4 class="text-muted fw-light">Library /</span> My Games</h4>

    <div class="row">
        @foreach($games as $game)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $game->produk->image }}" class="card-img-top" alt="{{ $game->produk->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->produk->name }}</h5>
                        <p class="card-text">{{ $game->produk->desc }}</p>
                        <a href="#" class="btn btn-primary">Play</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
