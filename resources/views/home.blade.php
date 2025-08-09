@extends('layouts.app')

@section('content')

    <style>
        .card-xl {
            width: 700px;
            max-width: 90vw;
            margin: 200px auto;
            border-radius: 24px;
            font-size: 1.2rem;
            justify-content: center;
            align-content: center
        }

    </style>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </nav>

    <div class="card card-xl">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    
@endsection
