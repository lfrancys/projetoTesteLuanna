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
                <a href="{{route('produtos.destroy')}}">Excluir</a>--}}

                <a href="{{route('produtos.edit', $produto->id)}}">Editar</a>
                {!! Form::button(trans('Produtos.partials.btnExcluir'), ['class' => 'w3-btn w3-indigo w3-round-large', 'link' => route('produtos.destroy', $produto->id),'id' => 'btnExcluir']) !!}
            </td>
        </tr>
    @endforeach
</table>


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

    jQuery(document).ready(function(){

       $("#btnExcluir").click(function(e){
           jQuery.ajax({
               type: 'DELETE',
               url: $(this).attr('link'),
               data: {'_token': '{{csrf_token()}}' }
           }).done(function( msg ) {
               alert( "Data Saved: " + msg );
           });
       });

    });

</script>
