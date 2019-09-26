@php $level += 1 @endphp
<ul class="children">
@forelse($comments as $comment)
<li class="thread-alt depth-{{ $level }}">
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
        @include('blog.comment_replies', ['comments' => $comment->replies, 'comment_id' => $comment->id])
    </div>
</li>
@empty
    
@endforelse
</ul>
{!! Form::open(['route' => ['comments.reply-comment', $article->id, $comment_id], 'method' => 'put']) !!}
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
    <button type="submit" class="submit">Responder</button>
</fieldset>
{!! Form::close() !!}

