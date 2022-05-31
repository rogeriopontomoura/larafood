@extends('adminlte::page')

@section('title', 'Cadastrar novo perfil')

@section('content_header')
    <h1>Cadastrar Perfil</h1>
@stop

@section('content')
    <div class="card">

        <form action=" {{ route('profiles.store') }}" method="POST">
            @include('admin.pages.profiles._partials.form')
    </form>
    </div>
@stop