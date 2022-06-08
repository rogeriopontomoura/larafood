@extends('adminlte::page')

@section('title', "Ver Detalhes do Plano {$plan->name}")

@section('content_header')
    <h1>Ver Detalhes do Plano {{$plan->name}}</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Plans</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plan.details.index', $plan->url) }}">Details</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('plan.details.show', [$plan->url, $detail->id]) }}">Ver</a></li>
        </ol>
      </nav>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Plano: {{$plan->name}}
        </div>
        <div class="card-body">
            <strong>Nome:</strong> {{$detail->name}}
        </div>
        <div class="card-footer">
            <form action="{{ route('plan.details.destroy', [$plan->url, $detail->id]) }}" method="POST">
                @csrf
                @method('DELETE') 
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"> </i> - Deletar Plano</button>
            </form>                
        </div>                

    </div>
@stop