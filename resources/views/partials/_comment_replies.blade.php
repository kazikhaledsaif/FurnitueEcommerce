<!-- _comment_replies.blade.php -->

@foreach($comments as $comment)


    <div class="single-comment {{ $comment->parent_id !== null  ? 'reply-comment' : '' }}">
   {{--   <span class="reply-btn"><a href="#">Reply</a></span>--}}


        <div class="content">
            <h3 class="user">{{ $comment->user->name }} <span class="comment-time">{{ $comment->created_at->format('F j, Y') }}</span></h3>
            <p class="comment-text">{{ $comment->body }}</p>
        </div>
        <br>

        <div class="comment-reply-box comment-form ">
            <form method="post" action="{{ route('reply.add') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-10">
                <div class="form-group ">
                    <textarea name="comment_body" id="commentMessage2"  required="required"></textarea>
                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                </div>
                    </div>
                    <div class="col-lg-2">
                        <input type="submit" class="reply-btn pataku-btn pataku-btn-reply" value="Reply" />
                    </div>
                </div>

            </form>
        </div>

    </div>
    @include('partials._comment_replies', ['comments' => $comment->replies])

@endforeach