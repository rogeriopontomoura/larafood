@include('admin.includes.alerts')
@csrf
<div class="card-header">
{{ $plan->name  ?? 'Cadastrar'  }}
</div>
<div class="card-body">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $plan->name ?? old('name') }}">
    </div>

    <div class="form-group">
        <label for="price">Preço</label>
        <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{ $plan->price  ?? old('price') }}">
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $plan->description  ?? old('description') }}">
    </div>
</div>
<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-dark">Enviar</button>
    </div>            
</div>