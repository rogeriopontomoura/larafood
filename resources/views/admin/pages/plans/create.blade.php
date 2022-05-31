@extends('adminlte::page')

@section('title', 'Cadastrar Plano')

@section('content_header')
    <h1>Cadastrar Plano</h1>
@stop

@section('content')
    <div class="card">

        <form action=" {{ route('plans.store') }}" method="POST">
            @include('admin.pages.plans._partials.form')
    </form>
    </div>
@stop