@extends('layout.principal')

@section('conteudo')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
        <div class="form-group">
            <input name="tamanho" type="text" class="form-control" placeholder="Tamanho">
        </div>

        <div class="form-group">
            <select name="categoria_id" class="form-control">
                <option value="" selected="selected" disabled="disabled">Selecione a categoria</option>
                @foreach($categorias as $c)
                    <option value="{{$c->id}}">{{$c->nome}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </form>
@stop