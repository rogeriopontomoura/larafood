@extends('adminlte::page')

@section('title', 'Detalhs do Plano')

@section('content_header')
    <h1>Planos <a href="{{ route('plan.details.create', $plan->url) }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Adicionar</a></h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Plans</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plan.details.index', $plan->url) }}">Details</a></li>
        </ol>
      </nav>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                    <tr>
                        <td>
                            {{ $detail->name }}    
                        </td>
                        <td width="220">
                            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                                <a href="{{ route('plan.details.show', [$plan->url, $detail->id]) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('plan.details.edit', [$plan->url, $detail->id]) }}" class="btn btn-warning">Editar</a>
                            
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>                             
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
        </div>                

    </div>
@stop