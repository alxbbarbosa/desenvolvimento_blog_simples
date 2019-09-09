@if($errors->any())
<div class="alert alert-danger alert-block" id="alertErrors">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <p>
        <i class="fas fa-fw fa-times-circle"></i>&nbsp;&nbsp;<strong>Os seguintes erros exigem sua atenção:</strong>
        <hr>
    </p>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success alert-block" id="alertSuccess">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="fas fa-fw fa-check-circle"></i>&nbsp;&nbsp;{{ Session::get('success') }}
</div>
@endif