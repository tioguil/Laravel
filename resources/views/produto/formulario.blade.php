@extends('layout.principal')

@section('conteudo')

    <h1>Novo produto</h1>

    <form action="/produtos/adicionaProduto" method="POST">
        <input type="hidden"
               name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
            <input name="nome" class="form-control" placeholder="Nome">
        </div>
        <div class="form-group">
            <input name="descricao" class="form-control" placeholder="Descrição">
        </div>
        <div class="form-group">
            <input name="valor" class="form-control" placeholder="Valor">
        </div>
        <div class="form-group">
            <input name="quantidade" type="number" class="form-control" placeholder="Quantidade">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </form>
@stop