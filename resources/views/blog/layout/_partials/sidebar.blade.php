<div id="sidebar" class="four columns">
    <div class="widget widget_search">
        <h3>Search</h3>
        <form action="#">

            <input type="text" value="Procurar..." onblur="if (this.value == '') {
                                        this.value = 'Procurar...';
                                    }" onfocus="if (this.value == 'Procurar...') {
                                                this.value = '';
                                            }" class="text-search">
            <input type="submit" value="" class="submit-search">

        </form>
    </div>

    <div class="widget widget_categories group">
        <h3>Categorias</h3>
        <ul>
            @forelse($categories as $category)
            <li><a href="#" title="">{{ $category->category }}</a> ({{ $category->count }})</li>
            @empty

            @endforelse
        </ul>
    </div>

    @if(isset($widget_text))
        @include('blog.layout._partials.widget_text')
    @endif

    @if(isset($article))
    <div class="widget widget_tags">
        <h3>Post Tags.</h3>
        <div class="tagcloud group">
            @forelse($article->tagNames() as $tag)
            <a href="{{ route('blog.article',['id' => $article->id])  }}">{{ $tag }}</a>
            @empty
                
            @endempty
        </div>

    </div>
    @endif

    <div class="widget widget_popular">
        <h3>Últimos artigos</h3>

        <ul class="link-list">
            @forelse($last_articles as $la)
            <li><a href="{{ route('blog.article',['id' => $la->id])  }}">{{ (new DateTime($la->created_at))->format('d/m/Y') }} - {{ $la->title }}</a></li>
            @empty
                
            @endforelse
        </ul>

    </div>
</div>