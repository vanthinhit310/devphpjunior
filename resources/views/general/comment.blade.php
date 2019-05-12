@auth
    <script>
        var add_sub_comment_url = '{{route('process.addSubComment')}}'
    </script>
    <section class="comment-pages-wrapper">
        <div class="container">
            <div class="comment-display">
                <div class="count-comment"><h4><i class="fal fa-comment"></i> Comment @if (isset($count_comment))
                            ( {{$count_comment}} ) @endif</h4>
                </div>
                @if(isset($comments) && $comments != null)
                    @foreach($comments as $comment)
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 comment-body">
                            <div class="row each-comment">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <img src="{{asset($comment->getUserComment->avatar)}}" class="img-fluid"
                                         alt="Avatar">
                                </div>
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    <strong class="name-user"><i class="fal fa-user-tag"></i> {{$comment->name}}
                                    </strong> <span><i
                                            class="fal fa-clock"></i> {{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                    <p class="comment-text fs-16">
                                        {!! $comment->comment !!}
                                    </p>
                                </div>
                            </div>

                            <div class="chil-comment">
                                <div class="row">
                                    {{--<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">--}}
                                        {{--<img src="{{asset(\Illuminate\Support\Facades\Auth::user()->avatar)}}"--}}
                                             {{--class="img-fluid"--}}
                                             {{--alt="Avatar">--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">--}}
                                        {{--<strong class="name-user">Le Van Thinh</strong> <span>50 days ago</span>--}}
                                        {{--<p class="comment-text fs-16">--}}
                                            {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien.--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <span><i class="fal fa-reply-all"></i> Reply</span>
                                    </div>
                                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                        <div class="comment-sub">
                                            <div class="sub-content">
                                                <form action="" method="post">
                                                    @csrf
                                                    <input type="hidden" id="id_comment_parent" value="{{$comment->id}}">
                                                    <input type="hidden" id="id_post" value="{{$comment->id_post}}">
                                                    <div class="comment-content">
                                                        <textarea name="commentSub"  id="commentSub" class="commentSub" rows="1"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="publish-comment">
                                                <button type="button" class="add-sub-comment"><i class="fal fa-paper-plane"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <form action="{{route('process.addComment')}}" method="post">
            @if(isset($post) && $post != null)
                    <input type="hidden" name="postID" value="{{$post->id}}">
                @endif
                <div class="comment col-sm-9 col-md-9 col-lg-9 col-xs-9">
                    <div class="top-content">
                        <a href="javascript:;">Write</a> <span id="replyTo" style="display: none; color: #0b2e13"> You are replying to the comment of <strong id="commenter"></strong> </span>
                        <hr>
                    </div>
                    @csrf
                    <div class="row center-content">
                        <div class="avatar col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            @auth
                                <img src="{{asset(Auth::user()->avatar)}}" class="img-fluid" alt="Avatar">
                            @endauth
                        </div>
                        <div class="comment-content col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            <textarea name="comment" id="commentPost" rows="2"></textarea>
                        </div>
                        @if ($errors->any())
                            <div class="text-danger fs-12 m-l-75">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="publish-comment">
                        <button type="submit">Post comment</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@else
    <div class="container">
        <h5 class="authentication-notify text-info">Please login to post your comment.</h5>
    </div>
@endauth
