@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <h1>Editando</h1>
@stop

@section('content')
    <div class="card">

        <form action=" {{ route('profiles.update', $profile->id) }} " method="POST">
            @csrf
            @method('PUT')          
            @include('admin.pages.profiles._partials.form')           
    </form>
    </div>
@stop