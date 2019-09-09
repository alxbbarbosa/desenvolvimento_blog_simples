<div>
    {!! Form::checkbox('active', true, null, ['class' => 'custom-control-input']) !!}
    {!! Form::label('active', 'Ativo', ['class' => 'custom-control-label']) !!}
</div>
<div class="form-group">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>
<div class="form-group">
    <strong>Funções de usuário:</strong>
    <br/><br/>
    {!! Form::select('roles[]', $roles, $userRole ?? [], array('class' => 'form-control','multiple')) !!}
</div>
<div class="form-group">
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
</div>
<div class="form-group">
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
</div>
<div class="form-group">
    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmar senha']) !!}
</div>
<div class="form-group">
    <a class="btn btn-primary" href="{{ url()->previous() }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Cancela</a>
    {!! Form::button("<i class='fas fa-fw fa-check'></i>&nbsp;&nbsp;Salvar", ['type' => 'submit' ,'class' => 'btn btn-success']) !!}
</div>