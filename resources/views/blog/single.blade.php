@extends('blog.layout.blog')

@section('title', 'Mantenha Simplicidade')

@section('metas')
<meta name="description" content="Blog: {{ $title }}@if(strlen($sub_title) > 0), {{ $sub_title }}@endif" />
<meta name="author" content="{{ $article->user->name }}" />
<meta name="keywords" content="{{ implode(', ', array_map(function($w){ return strtolower($w); },$article->tagNames())) }}"/>
@endsection

@section('css')

@endsection

@section('content')
<article class="entry">

    <header class="entry-header">

        <h2 class="entry-title">
            {{ $article->title }}
        </h2>

        <div class="entry-meta">
            <ul>
                <li>{{ (new DateTime($article->created_at))->format('d-m-Y H:i') }}</li>
                <span class="meta-sep">&bull;</span>
                <li>
                    <a href="#" title="" rel="category tag">{{ $article->category->category }}</a>
                </li>
                <span class="meta-sep">&bull;</span>
                <li>{{ $article->user->name }}</li>
            </ul>
        </div>

    </header>

    <p>{!! $article->body !!}</p>

    <p class="tags">
        <span>Tagged in </span>:
        <a href="#">orci</a>, <a href="#">lectus</a>, <a href="#">varius</a>, <a href="#">turpis</a>
    </p>

    <ul class="post-nav group">
        <li class="prev"><a rel="prev" href="#"><strong>Artigo anterior</strong> Duis Sed Odio Sit Amet Nibh Vulputate</a></li>
        <li class="next"><a rel="next" href="#"><strong>Próximo Artigo</strong> Morbi Elit Consequat Ipsum</a></li>
    </ul>

</article>
<div id="app">
   
</div>

<!-- Comentários
================================================== -->
<div id="comments">
@php $level = 1 @endphp
  

    @if($article->approvedComments->count() > 0)
    <h3>{{ $article->approvedComments->count() }} @if($article->approvedComments->count() > 1) comentários @else comentário @endif</h3>
    @else
    <h3>Ninguém comentou ainda, seja o primeiro!</h3>
    @endif

    <!-- lista de comentários -->
    <div>
    @include('blog.comments', ['comments' => $article->approvedComments, 'article_id' => $article->id])
    </div>
    <!-- Fim da lista de comentários -->
    <!-- Div para Formulário para novo comentário -->
        <h3>Deixe um comentário</h3>
        <a href="#" class="open_comment">Clique aqui para comentar</a>
        <div class="comment">
            <!-- Formulário novo comentário -->
                {!! Form::open(['route' => ['comments.add-comment'], 'method' => 'post']) !!}
    
                {!! Form::hidden('article_id', $article->id) !!}
                <fieldset>
                    <div class="group">
                        <label for="name">Nome <span class="required">*</span></label>
                        <input name="name" type="text" id="name" size="35" value="" />
                    </div>
                    <div class="group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input name="email" type="text" id="email" size="35" value="" />
                    </div>
                    <div class="group">
                        <label for="website">Website</label>
                        <input name="website" type="text" id="website" size="35" value="" />
                    </div>
                    <div class="message group">
                        <label  for="body">Mensagem <span class="required">*</span></label>
                        <textarea name="body" id="body" rows="10" cols="50" ></textarea>
                    </div>
                    <button type="submit" class="submit">Comentar</button>
                </fieldset>
             {!! Form::close() !!}
            <!-- Final do formulário para novo comentário -->
        </div>
    <!-- Fim da DIV do formuário de comentários -->
</div>  <!-- Fim dos comentários -->
@endsection


@section('js')

<script>
    
    $(function(){

        $(".open_comment").click(function(e){

            e.preventDefault()
            e.stopImmediatePropagation()

            $('div[class="comment"]').each(function(){
                $(this).children().not('[style*="display: none"]').slideToggle()
            })

            $("a[class='open_comment']").each(function(){
                $(this).show('slow')
            })

            $(this).hide('slow')

            $(this).siblings(".comment").children().slideToggle()

        })
    })   
</script>		
@endsection
