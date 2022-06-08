@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Detalhes do plano <b> {{ $plan->name }} </b></h1>
@stop

@section('content')
    <ul>
        <li>
            <strong>Nome:</strong> {{ $plan->name }}
        </li>
        <li>
            <strong>Preço:</strong> {{  'R$ '.number_format($plan->price, 2, ',', '.') }}
        </li>
        <li>
            <strong>Descrição:</strong> {{ $plan->description }}
        </li>                
    </ul>
    <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
        @csrf
        @method('DELETE') 
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"> </i> - Deletar Plano</button>
    </form>    
@stop