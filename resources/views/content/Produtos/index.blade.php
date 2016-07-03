@extends('../layout/index')

@section('content')
<h1>Produtos</h1>

<button>Novo Produto</button>

<br/><br/>

<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Foto</th>
            <th>Ações</th>
        </tr>
    </thead>
    @foreach($produtos as $produto)
        <tr>
            <td> {{$produto->nome}} </td>
            <td> {{$produto->preco}} </td>
            <td> {{$produto->descricao}} </td>
            <td> {{$produto->foto}} </td>
            <td> Acao </td>
        </tr>
    @endforeach
</table>


@endsection
