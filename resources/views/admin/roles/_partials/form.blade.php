<div class="form-group">
    {!! Form::text('name', null, array('placeholder' => 'Nome da função de usuário','class' => 'form-control')) !!}
</div>
<div class="form-group">
    <strong>Permissões:</strong>
        <br/><br/>
        @foreach($permissions as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, $permissions->contains($value->id) ? true : false, array('class' => 'name')) }}
            {{ $value->name }}</label>
        <br/>
        @endforeach
        @if(!empty($unassigned))
            <hr>
            <strong>Atribuir:</strong>
            <br/><br/>
            @foreach($unassigned as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, $permissions->contains($value->id) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
                <br/>
            @endforeach
        @endif
</div>
<div class="form-group">
    <a class="btn btn-primary" href="{{ url()->previous() }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Cancela</a>
    {!! Form::button("<i class='fas fa-fw fa-check'></i>&nbsp;&nbsp;Salvar", ['type' => 'submit' ,'class' => 'btn btn-success']) !!}
</div>