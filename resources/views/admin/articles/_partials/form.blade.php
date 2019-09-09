<div>
    {!! Form::checkbox('active', true, null, ['class' => 'custom-control-input']) !!}
    {!! Form::label('active', 'Ativo', ['class' => 'custom-control-label']) !!}
</div>
<div class="form-group">
    {!! Form::select('category_id',$categories,
    null, ['class' => 'form-control', 'placeholder' => 'Categoria']) !!}
</div>
<div class="form-group">
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título']) !!}
</div>
<div class="form-group">
    {!! Form::textarea('resume', null, ['rows' => 3, 'style' => 'resize: none;', 'class' => 'form-control', 'placeholder' => 'Resumo (Opcional)']) !!}
</div>
<div class="form-group">
    <!--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->
    <!-- <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script> -->
    {!! Form::textarea('body', null, ['rows' => 10, 'style' => 'resize: none;', 'class' => 'form-control tinymce',  'placeholder' => 'Corpo']) !!}
    <!--<script>
        /*
        var editor_config = {
            path_absolute: "{{ url('/') }}/",
            selector: "textarea.my-editor",
            language: 'pt_BR',
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern moxiemanager"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };
        tinymce.init(editor_config);
     * */
         
    </script>-->

    
</div>
<div class="form-group">
    <div>
        <!-- < editor class="tinymce">< / editor> -->
    </div>
</div>
<div class="form-group">
    <input type="hidden" v-model="tag" v-bind:value="tag" name="tags" />
    <div>
        <vue-tags-input v-model="tag" :tags="tags" @tags-changed="newTags => tags = newTags" />
    </div>

    @if(isset($recordSet))
        <strong>Tag:</strong>
            @forelse($recordSet->tags as $tag)
                <label class="label label-info">{{ $tag->name }}</label>
            @empty
            @endforelse
    @endif
</div>
<div class="form-group">
    <a class="btn btn-primary" href="{{ url()->previous() }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Cancela</a>
    {!! Form::button("<i class='fas fa-fw fa-check'></i>&nbsp;&nbsp;Salvar", ['type' => 'submit' ,'class' => 'btn btn-success']) !!}
</div>