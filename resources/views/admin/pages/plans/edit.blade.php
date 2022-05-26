@extends('adminlte::page')

@section('title', 'Cadastrar Plano')

@section('content_header')
    <h1>Editando</h1>
@stop

@section('content')
    <div class="card">

        <form action=" {{ route('plans.update', $plan->url) }} " method="POST">
            @csrf
            @method('PUT')          
            @include('admin.pages.plans._partials.form')           
    </form>
    </div>
@stop