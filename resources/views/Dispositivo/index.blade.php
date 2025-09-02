@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
    <li class="breadcrumb-item " aria-current="page">Dispositivo</li>
  </ol>
</nav>

<h1 id="titulo">Dispositivos</h1>
<p>
  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam natus et doloribus neque delectus, culpa, quasi adipisci, quos vel deleniti unde. Corrupti architecto vero quaerat repellat tenetur sequi! Natus, sunt.
</p>

<button class="btn-crear" onclick="modalDispositivo()" id="btnCrear">Crear dispositivo</button>

@include('Dispositivo.partials.modal')

@include('Dispositivo.partials.table')


@endsection