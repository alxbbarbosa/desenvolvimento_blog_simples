<div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['route' => $rota, 'class' => 'form form-inline']) !!}
        {!! Form::text('search', $data['search'] ?? null, ['class'=>'form-control', 'placeholder' => 'Filtrar por ...']) !!}
        {!! Form::submit('Procurar', ['class' => 'btn btn-primary']) !!}
        <div class="radio-inline">
            <div class="col-sm-6">
                <label>
                    {!! Form::radio('type', 1, isset($type) ? ($type == 1 ? true : null) : null, ['class' => 'optradio']) !!} Correspondência exata
                </label>
            </div>
            <div class="col-sm-6">
                <label>
                    {!! Form::radio('type', 3, isset($type) ? ($type == 3 ? true : null) : null, ['class' => 'optradio']) !!} Inicia com texto indicado
                </label>
            </div>
            <div class="col-sm-6">
                <label>
                    {!! Form::radio('type', 2, isset($type) ? ($type == 2 ? true : null) : null, ['class' => 'optradio']) !!} Correspondência aproximada
                </label>
            </div>
            <div class="col-sm-6">
                <label>
                    {!! Form::radio('type', 4, isset($type) ? ($type == 4 ? true : null) : null, ['class' => 'optradio']) !!} Termina com texto indicado
                </label>
            </div>
            <label>
        </div>

        {!! Form::close() !!}

        @if(isset($data['search']))
        <hr>
        {!! Form::checkbox('filtrar', true, true, ['class' => 'custom-control-input']) !!}
        Resultados filtrador por: <strong>{{ $data['search'] }}</strong>
        @endif
    </div>
</div>