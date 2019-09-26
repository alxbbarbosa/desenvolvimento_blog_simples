<div class="form-group">
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título']) !!}
</div>
<div class="form-group">
    {!! Form::text('sub_title', null, ['class' => 'form-control', 'placeholder' => 'Sub título']) !!}
</div>
<div class="form-group">
    {!! Form::text('copyright', null, ['class' => 'form-control', 'placeholder' => 'Copyright']) !!}
</div>
<div class="form-group">
    {!! Form::text('link_facebook', null, ['class' => 'form-control', 'placeholder' => 'Link do Facebook']) !!}
</div>
<div class="form-group">
    {!! Form::text('link_twitter', null, ['class' => 'form-control', 'placeholder' => 'Link do twitter']) !!}
</div>
<div class="form-group">
    {!! Form::text('link_google_plus', null, ['class' => 'form-control', 'placeholder' => 'Link do Google+']) !!}
</div>
<div class="form-group">
    {!! Form::text('link_instagram', null, ['class' => 'form-control', 'placeholder' => 'Link do Instagram']) !!}
</div>
<div class="form-group">
    {!! Form::text('link_github', null, ['class' => 'form-control', 'placeholder' => 'Link do Github']) !!}
</div>
<div class="form-group">
    {!! Form::text('link_flickr', null, ['class' => 'form-control', 'placeholder' => 'Link do Flickr']) !!}
</div>
<div class="form-group">
    {!! Form::text('link_skype', null, ['class' => 'form-control', 'placeholder' => 'Link do Skype']) !!}
</div>
<div class="form-group">
    {!! Form::text('paragraph_title_footer', null, ['class' => 'form-control', 'placeholder' => 'Título para parágrafo no Rodapé']) !!}
</div>
<div class="form-group">
    {!! Form::textarea('paragraph_footer', null, ['class' => 'form-control', 'placeholder' => 'Parágrafo "Sobre" do rodapé']) !!}
</div>
<div>
    {!! Form::checkbox('allows_registration', true, null, ['class' => 'custom-control-input']) !!}
    {!! Form::label('allows_registration', 'Permite outros usuários se registrarem', ['class' => 'custom-control-label']) !!}
</div>
<div class="form-group">
    <a class="btn btn-primary" href="{{ url()->previous() }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Cancela</a>
    {!! Form::button("<i class='fas fa-fw fa-check'></i>&nbsp;&nbsp;Salvar", ['type' => 'submit' ,'class' => 'btn btn-success']) !!}
</div>
<hr>