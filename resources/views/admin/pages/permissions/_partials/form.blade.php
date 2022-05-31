@include('admin.includes.alerts')

@csrf
<div class="card-header">
{{ $permission->name  ?? 'Cadastrar'  }}
</div>
<div class="card-body">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $permission->name ?? old('name') }}">
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $permission->description  ?? old('description') }}">
    </div>
</div>
<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-dark">Enviar</button>
    </div>            
</div>