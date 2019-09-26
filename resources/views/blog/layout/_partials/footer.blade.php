<footer>

    <div class="row">

        <div class="twelve columns">
            <ul class="social-links">
                <li><a href="{{ $config->link_facebook }}"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{ $config->link_twitter }}"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{ $config->link_google_plus }}"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="{{ $config->link_github }}"><i class="fa fa-github-square"></i></a></li>
                <li><a href="{{ $config->link_instagram }}"><i class="fa fa-instagram"></i></a></li>
                <li><a href="{{ $config->link_flickr }}"><i class="fa fa-flickr"></i></a></li>
                <li><a href="{{ $config->link_skype }}"><i class="fa fa-skype"></i></a></li>
            </ul>
        </div>

        <div class="six columns info">

            <h3>{{ $config->paragraph_title_footer }}</h3>

            <p>{{ $config->paragraph_footer }}</p>

        </div>

        <div class="four columns">


        </div>

        <div class="two columns">
            <h3 class="social">Navigate</h3>

            <ul class="navigate group">
                <li><a href="{{ route('blog.index') }}">Home</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>

        <p class="copyright">{{ $config->copyright }}</p>

    </div> <!-- End row -->
    <div id="go-top"><a class="smoothscroll" title="Voltar para cima" href="#top"><i class="fa fa-chevron-up"></i></a></div>
</footer>