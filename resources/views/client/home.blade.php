@extends('layouts.client')

@section('title', 'Inicio')

@section('content')
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">
            @auth
                Hola {{ auth()->user()->name }}
            @else
                Hola Mundo
            @endauth
        </h1>

        <p class="text-gray-600">
            Bienvenido a tu e-commerce en Laravel
        </p>
    </div>
@endsection
