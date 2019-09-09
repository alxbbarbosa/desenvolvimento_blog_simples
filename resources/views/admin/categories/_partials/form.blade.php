<div class="form-group">
    {!! Form::text('category', null, ['class' => 'form-control', 'placeholder' => 'Categoria']) !!}
</div>
<div class="form-group">
    <a class="btn btn-primary" href="{{ url()->previous() }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Cancela</a>
    {!! Form::button("<i class='fas fa-fw fa-check'></i>&nbsp;&nbsp;Salvar", ['type' => 'submit' ,'class' => 'btn btn-success']) !!}
</div>