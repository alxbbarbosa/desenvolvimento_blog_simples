<div id="sidebar" class="four columns">
    <div class="widget widget_search">
        <h3>Search</h3>
        <form action="#">

            <input type="text" value="Procurar ..." onblur="if (this.value == '') {
                                        this.value = 'Search here...';
                                    }" onfocus="if (this.value == 'Search here...') {
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

    <div class="widget widget_tags">
        <h3>Post Tags.</h3>

        <div class="tagcloud group">
            <a href="#">Corporate</a>
            <a href="#">Onepage</a>
            <a href="#">Agency</a>
            <a href="#">Multipurpose</a>
            <a href="#">Blog</a>
            <a href="#">Landing Page</a>
            <a href="#">Resume</a>
        </div>

    </div>

    <div class="widget widget_popular">
        <h3>Popular Post.</h3>

        <ul class="link-list">
            <li><a href="#">Sint cillum consectetur voluptate.</a></li>
            <li><a href="#">Lorem ipsum Ullamco commodo.</a></li>
            <li><a href="#">Fugiat minim eiusmod do.</a></li>
        </ul>

    </div>
</div>