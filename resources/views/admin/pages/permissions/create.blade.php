@extends('adminlte::page')

@section('title', 'Cadastrar nova permissão')

@section('content_header')
    <h1>Cadastrar Permissão</h1>
@stop

@section('content')
    <div class="card">

        <form action=" {{ route('permissions.store') }}" method="POST">
            @include('admin.pages.permissions._partials.form')
    </form>
    </div>
@stop