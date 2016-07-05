@extends('../layout/index')

@section('content')
<h1>Cadastro de Produtos</h1>

{!! Form::open(array('url' => route('produtos.store'), 'method' => 'POST', 'id' => 'produtos_create')) !!}
    @include('content.Produtos.partials.form')
{!! Form::close() !!}


@endsection
