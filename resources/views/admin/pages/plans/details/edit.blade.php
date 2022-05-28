@extends('adminlte::page')

@section('title', "Editar Detalhes do Plano {$plan->name}")

@section('content_header')
    <h1>Editar Detalhes do Plano {{$plan->name}}</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Plans</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plan.details.index', $plan->url) }}">Details</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('plan.details.edit', [$plan->url, $detail->id]) }}">Editar</a></li>
        </ol>
      </nav>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('plan.details.update', [$plan->url, $detail->id])}}" method="POST">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
                
            </form>          
        </div>
        <div class="card-footer">
        </div>                

    </div>
@stop