@extends('layout.principal')
@section('conteudo')

    @if(old('nome'))
        <div class="alert alert-success" role="alert">
            O produto <b> {{old('nome')}} </b>foi adicionado com sucesso!
        </div>
    @endif

    @if(!empty($_GET['retorno']))
        <div class="alert alert-success" role="alert">
            Produto removido com sucesso!
        </div>
    @endif

    @if(empty($produtos))
        <div class="alert alert-danger">
            Você não tem nenhum produto cadastrado.
        </div>

    @else
        <h1>Listagem de produtos</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($produtos as $p)
                <tr class="{{$p->quantidade<=1 ? 'danger' : '' }}">
                    <td> {{$p->nome}} </td>
                    <td> {{$p->valor}} </td>
                    <td> {{$p->descricao}} </td>
                    <td> {{$p->quantidade}} </td>
                    <td> {{$p->tamanho}}</td>
                    <td> {{$p->categoria->nome}}</td>
                    <td>
                        <a href="/produtos/mostra/{{$p->id}}">
                            <span class="btn btn-primary">Mostrar</span>
                        </a>
                    </td>
                    <td>
                        <a href="/produtos/removeProduto/{{$p->id}}">
                            <span class="btn btn-warning">Remover</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <h4>
  <span class="label label-danger pull-right">
    Um ou menos itens no estoque
  </span>
    </h4>

@stop