@extends('blog.layout.blog')

@section('title', $config->title)

@section('metas')
<meta name="description" content="Blog: {{ $config->title }}@if(strlen($config->sub_title) > 0), {{ $config->sub_title }}@endif" />
@endsection

@section('content')
<!-- -->
@forelse($articles as $article)
<article class="entry">

    <header class="entry-header">

        <h2 class="entry-title">
            <a href="{{ route('blog.article',['id' => $article->id])  }}" title="">{{ $article->title }}</a>
        </h2>

        <div class="entry-meta">
            <ul>
                <li>{{ (new DateTime($article->created_at))->format('d-m-Y') }}</li>
                <span class="meta-sep">&bull;</span>
                <li><a href="#" title="" rel="category tag">{{ $article->category->category }}</a></li>
                <span class="meta-sep">&bull;</span>
                <li>{{ $article->user->name }}</li>
            </ul>
        </div>

    </header>

    <div class="entry-content">
        <p>{!! isset($article->resume) ? substr($article->resume, 0, strpos($article->resume, ' ', 300 ) - 1) : '' !!}</p>
        <P>
            <a href="{{ route('blog.article',['id' => $article->id])  }}" title="">CONTINUE LENDO ..</a>
        </P>
    </div>

</article>
<!-- end entry -->
@empty

@endforelse

@endsection
