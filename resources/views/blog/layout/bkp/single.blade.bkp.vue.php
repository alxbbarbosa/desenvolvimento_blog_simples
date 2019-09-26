@extends('blog.layout.blog')

@section('title', 'Mantenha Simplicidade')

@section('js')
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
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
    <comments-manager :u="'{{ route('comments.api.list') }}'"></comments-manager>
</div>
	
@endsection