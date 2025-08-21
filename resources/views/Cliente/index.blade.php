@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
    <li class="breadcrumb-item " aria-current="page">Clientes</li>
  </ol>
</nav>

<h1 id="titulo">Clientes</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, iste, sint perferendis officia mollitia saepe dicta asperiores aut beatae modi incidunt, suscipit et voluptatum odio. Qui fugit ex vero vel.</p>


<button class="btn-crear" onclick="modalCliente()" id="btnCrear">BOTON DE PRUEBA</button>

@include('Cliente.partials.modal')

@include('Cliente.partials.table')


@endsection