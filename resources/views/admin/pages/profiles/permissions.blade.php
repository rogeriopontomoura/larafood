@extends('adminlte::page')

@section('title', 'Permissões do Perfil')

@section('content_header')
    <h1>
        Permissões do Perfil: 
        <b>{{ $profile->name }}</b>
        <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> 
            Adicionar
        </a>    
    </h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Profiles</a></li>
        </ol>
      </nav>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
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
                        <th>Description</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td>
                            <a href="{{ route('profiles.show', $permission->id) }}">
                            {{ $permission->name }}
                            </a>
                        </td>
                        <td>
                            {{ $permission->description }}
                        </td>
                        <td width="280">
                            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning">Editar</a>
                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-warning">Pemissões</a>
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
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif

        </div>                

    </div>
@stop