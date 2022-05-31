@extends('adminlte::page')

@section('title', 'Profiles')

@section('content_header')
    <h1>Detalhes do Perfil <b> {{ $profile->name }} </b></h1>
@stop

@section('content')
    <ul>
        <li>
            <strong>Nome:</strong> {{ $profile->name }}
        </li>
        <li>
            <strong>Descrição:</strong> {{ $profile->description }}
        </li>                
    </ul>
    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
        @csrf
        @method('DELETE') 
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"> </i> - Deletar Perfil</button>
    </form>    
@stop