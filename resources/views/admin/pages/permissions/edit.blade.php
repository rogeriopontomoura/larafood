@extends('adminlte::page')

@section('title', 'Editar Permissão')

@section('content_header')
    <h1>Editando</h1>
@stop

@section('content')
    <div class="card">

        <form action=" {{ route('permissions.update', $permission->id) }} " method="POST">
            @csrf
            @method('PUT')          
            @include('admin.pages.permissions._partials.form')           
    </form>
    </div>
@stop