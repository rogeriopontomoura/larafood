@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Adicionar</a></h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Plans</a></li>
        </ol>
      </nav>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value=" {{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark btn-small"><i class="fas fa-search"></i> Pesquisar</button>
            </form>
            @include('admin.includes.alerts')
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                    <tr>
                        <td>
                            <a href="{{ route('plans.show', $plan->url) }}">
                            {{ $plan->name }}
                            </a>   
                        </td>
                        <td>                
                            {{  'R$ '.number_format($plan->price, 2, ',', '.') }}
                        </td>
                        <td width="280">
                            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                                <a href="{{ route('plan.details.index', $plan->url) }}" class="btn btn-info">Detalhes</a>
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-warning">Editar</a>
                            
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
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif

        </div>                

    </div>
@stop