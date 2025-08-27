@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
    <li class="breadcrumb-item " aria-current="page">Clientes</li>
  </ol>
</nav>

<h1 id="titulo">Clientes</h1>
<p>
    En esta sección podrás gestionar a todos tus clientes. 
    Aquí puedes crear nuevos registros, editar la información existente o eliminar clientes cuando sea necesario. 
    Mantén actualizada esta lista para un mejor control de tu negocio.
</p>

<button class="btn-crear" onclick="modalCliente()" id="btnCrear">Crear cliente</button>

@include('Cliente.partials.modal')

@include('Cliente.partials.table')


@endsection