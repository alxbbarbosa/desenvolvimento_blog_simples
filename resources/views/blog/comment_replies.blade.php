    <h3>{{ $article->comments->count() }} Comments</h3>

    <!-- commentlist -->
    <ol class="commentlist">
        @forelse($article->comments as $comment)
        <li class="depth-1">

            <div class="avatar">
                <img width="50" height="50" class="avatar" src="images/user-01.png" alt="">
            </div>

            <div class="comment-content">

                <div class="comment-info">
                    <cite>{{ $comment->name }}</cite>

                    <div class="comment-meta">
                        <time class="comment-time" datetime="{{ (new DateTime($comment->created_at))->format('Y-m-d H:i:s') }}">{{ (new DateTime($comment->created_at))->format('d-m-Y H:i') }}</time>
                        <span class="sep">/</span><a class="reply" href="#">Reply</a>
                    </div>
                </div>

                <div class="comment-text">
                    <p>{{ $comment->body }}</p>
                </div>

            </div>

        </li>
        @empty
            
        @endforelse
    </ol> <!-- Commentlist End -->

