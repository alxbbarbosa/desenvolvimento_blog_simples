@php $level += 1 @endphp
<ul class="children">
@forelse($comments as $comment)
<li class="thread-alt depth-{{ $level }}">
    <div class="comment-content" style="border-left: 2px solid #AEB6B7; padding: 5px">
        <div class="avatar" style="display: inline-block;" >
            <img width="50" height="50" class="avatar" src="@if(!is_null($comment->picture)) {{ $comment->picture }} @else {{ asset('images/user-01.png') }} @endif" alt="">
        </div>
        <strong><cite>{{ $comment->name }}</cite></strong><span class="sep"> | </span>
        <time class="comment-time" datetime="{{ (new DateTime($comment->created_at))->format('Y-m-d H:i:s') }}">{{ (new DateTime($comment->created_at))->format('d/m/Y H:i') }}</time>
        <span class="sep"> | </span><a class="reply open_comment" href="#">Reponder</a>
        <br /><br />
        <div class="comment-text" >
            <p>{{ $comment->body }}</p>
        </div>

        <div class="comment">
            <!-- form -->
            {!! Form::open(['route' => ['comments.add-comment'], 'method' => 'post', 'style' => "display: none"]) !!}
            
            {!! Form::hidden('article_id', $article_id) !!}
            
            {!! Form::hidden('parent_id', $comment->id) !!}
            
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
            <!-- Form End -->
        </div> <!-- Respond End -->
        <hr>

        @include('blog.comments', ['comments' => $comment->approvedReplies])
    </div>
</li>
@empty
    
@endforelse

{!! Form::close() !!}

