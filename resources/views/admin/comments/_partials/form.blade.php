<div>
    {!! Form::checkbox('approved', true, null, ['class' => 'custom-control-input']) !!}
    {!! Form::label('approved', 'Comentário aprovado', ['class' => 'custom-control-label']) !!}
</div>
@if(isset($recordSet))
<div>
    <hr>
    {!! Form::label('date_', 'Data de criação: ', ['class' => 'custom-control-label']) !!}
    {!! Form::label('date_', (new DateTime($recordSet->created_at))->format("d-m-Y H:i:s"), ['class' => 'form-control']) !!}
    <br />
    {!! Form::label('date_', 'Data de atualização: ', ['class' => 'custom-control-label']) !!}
    {!! Form::label('date_', (new DateTime($recordSet->updated_at))->format("d-m-Y H:i:s"), ['class' => 'form-control']) !!}
    <hr>
</div>
@endif
<div class="form-group">
    @if(isset($recordSet))
    {!! Form::hidden('article_id', $recordSet->article->id) !!} 
    {!! Form::label('article', $recordSet->article->title, ['class' => 'form-control']) !!}
    @else
    {!! Form::select('article_id', $articles, null, ['class' => 'form-control', 'placeholder' => 'Artigo']) !!}
    @endif
</div>
<div class="form-group">
    @if(isset($recordSet))
    {!! Form::label('name', $recordSet->name, ['class' => 'form-control']) !!}
    @else
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
    @endif
</div>
<div class="form-group">
    @if(isset($recordSet))
    {!! Form::label('homepage', $recordSet->name, ['class' => 'form-control']) !!}
    @else
    {!! Form::text('homepage', null, ['class' => 'form-control', 'placeholder' => 'Homepage']) !!}
    @endif
</div>
<div class="form-group">
    @if(isset($recordSet))
    {!! Form::label('email', $recordSet->email, ['class' => 'form-control']) !!}
    @else
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
    @endif
</div>
<div class="form-group">
    @if(isset($recordSet))
    {!! Form::label('picture', $recordSet->picture, ['class' => 'form-control']) !!}
    @else
    {!! Form::text('picture', null, ['class' => 'form-control', 'placeholder' => 'Imagem de avatar']) !!}
    @endif
</div>
<div class="form-group">
    @if(isset($recordSet))
    {!! Form::label('body', $recordSet->body, ['class' => 'form-control', 'style' => 'height: 150px;']) !!}
    @else
    {!! Form::textarea('body', null, ['rows' => 4,'class' => 'form-control', 'placeholder' => 'Corpo da mensagem']) !!}
    @endif
</div>
<div class="form-group">
    <a class="btn btn-primary" href="{{ url()->previous() }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Cancela</a>
    {!! Form::button("<i class='fas fa-fw fa-check'></i>&nbsp;&nbsp;Salvar", ['type' => 'submit' ,'class' => 'btn btn-success']) !!}
</div>