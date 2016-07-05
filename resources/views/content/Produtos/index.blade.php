@extends('../layout/index')

@section('content')
<h1>Produtos</h1>

<a href="{{route('produtos.create')}}" class="w3-btn w3-indigo w3-round-large">Novo Produto</a>

<br/><br/>

<table class="w3-table-all">
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descrição</th>
        <th>Foto</th>
        <th>Ações</th>
    </tr>
    @foreach($produtos as $produto)
        <tr>
            <td> {{$produto->nome}} </td>
            <td> {{$produto->preco}} </td>
            <td> {{$produto->descricao}} </td>
            <td> {{$produto->foto}} </td>
            <td>
               {{-- <a href="{{route('produtos.edit')}}">Editar</a>
                <a href="{{route('produtos.destroy')}}">Excluir</a> --}}
                <a href="{{route('produtos.destroy', $produto->id)}}" class="w3-btn w3-indigo w3-round-large">Excluir</a>
            </td>
        </tr>
    @endforeach
</table>


@endsection
