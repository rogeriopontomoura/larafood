@extends('adminlte::page')

@section('title', 'Permissions')

@section('content_header')
    <h1>Detalhes do Perfil <b> {{ $permission->name }} </b></h1>
@stop

@section('content')
    <ul>
        <li>
            <strong>Nome:</strong> {{ $permission->name }}
        </li>
        <li>
            <strong>Descrição:</strong> {{ $permission->description }}
        </li>                
    </ul>
    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
        @csrf
        @method('DELETE') 
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"> </i> - Deletar Perfil</button>
    </form>    
@stop