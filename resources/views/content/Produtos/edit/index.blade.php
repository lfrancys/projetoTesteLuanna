@extends('../layout/index')

@section('content')
<h1>Editando de Produto</h1>



{!! Form::model($produto, array('url' => route('produtos.update'), 'method' => 'PUT', 'id' => 'produtos_update')) !!}
    @include('content.Produtos.partials.form')
{!! Form::close() !!}


@endsection
