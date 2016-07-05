@if($errors->any())
    <div class="w3-container w3-red">
        <h3>Erro!</h3>
        <p>{{$errors->first()}}</p>
    </div>
@endif

<table class="w3-table">
    <tr>
        <td>
            {!! Form::label('categoria', trans('Produtos.partials.labelCategoria')) !!}
        </td>
        <td>
            {!! Form::select('idCategoria', $categorias, null, ['data-placeholder' => trans('Produtos.partials.placeholderCategoria'), 'class' => 'w3-select', 'multiple' => null]) !!}

        </td>
    </tr>
    <tr>
        <td>
            {!! Form::label('nome', trans('Produtos.partials.labelNome')) !!}
        </td>
        <td>
            {!! Form::input('text', 'nome', null, ['placeholder' => trans('Produtos.partials.placeholderNome'), 'class' => "w3-input"]) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::label('preco', trans('Produtos.partials.labelPreco')) !!}
        </td>
        <td>
            {!! Form::input('text', 'preco', null, ['placeholder' => trans('Produtos.partials.placeholderPreco'), 'class' => "w3-input"]) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::label('descricao', trans('Produtos.partials.labelDescricao')) !!}
        </td>
        <td>
            {!! Form::input('text', 'descricao', null, ['placeholder' => trans('Produtos.partials.placeholderDescricao'), 'class' => "w3-input"]) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::label('foto', trans('Produtos.partials.labelFoto')) !!}
        </td>
        <td>
            {!! Form::file('foto', null, [ 'class' => "w3-input"]) !!}
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <center>
                {!! Form::reset(trans('Produtos.partials.btnCancelar'), ['class' => 'w3-btn w3-dark-grey w3-round-large', 'id' => 'btnCancelar']) !!}
                {!! Form::submit(trans('Produtos.partials.btnCadastrar'), ['class' => 'w3-btn w3-indigo w3-round-large', 'id' => 'btnCadastrar']) !!}
            </center>
        </td>
    </tr>

</table>
