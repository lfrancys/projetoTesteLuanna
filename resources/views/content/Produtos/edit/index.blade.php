@extends('../layout/index')

@section('content')
<h1>Editando de Produto</h1>


{{--dd($produto)--}}


{!! Form::model($produto, array('url' => route('produtos.update', $produto->id), 'method' => 'PUT', 'id' => 'produtos_update')) !!}
    @include('content.Produtos.partials.form')
{!! Form::close() !!}


@endsection
