<section class="blog-wrapper">

    <div id="main-container">
        <div class="page-content container page-page">
            <section class="beau-mainbar">
                <blockquote>{{$about->blog_qoutes}}</blockquote>
                <article id="post-1731" class="post-1731 page type-page status-publish hentry">

                    <div style="background-attachment: scroll !important;"
                         class="vc_row wpb_row vc_row-fluid vc_custom_1443666427953">
                        <div class="vc_col-sm-12 wpb_column vc_column_container">
                            <div class="wpb_wrapper">
                                <div class='blog-list-style-masonry'>
                                    <div class="beau-blogs-list-container" data-posts-per-page="6" data-style="masonry">
                                        <div class='blog-list-isotope-container masonry-2-columns'>
                                            @foreach($posts as $post)
                                                <article id="post-92"
                                                         class="beau-post-in-list post-92 post type-post status-publish format-standard has-post-thumbnail hentry category-branding category-photography category-print tag-awesome tag-photography">
                                                    <div class="beau-article-featured-wrapper">
                                                        <a href="{{route('app.post')}}/{{$post->getPostCategory->slug}}/{{$post->slug}}"><img
                                                                width="1920" height="900" src="{{$post->image}}"
                                                                class="attachment-post-thumbnail wp-post-image"
                                                                alt="{{$post->title}}"/></a></div>
                                                    <div class="beau-article-content">
                                                        <h2 class="beau-article-title"><a
                                                                href="{{route('app.post')}}/{{$post->getPostCategory->slug}}/{{$post->slug}}"><em
                                                                    class="text-limit"><i class="fal fa-arrow-alt-right"></i> {{$post->title}}</em></a></h2>
                                                        <div class="beau-article-author"><i class="fal fa-portrait"></i> By <a href="javascript:;"
                                                                                               title="Posts by beauwp"
                                                                                               rel="author">{{$post->author}}</a>
                                                        </div>
                                                        <div class="beau-article-excerpt">
                                                            <p class="text-limit">{{$post->description}}</p>
                                                            <a href="{{route('app.post')}}/{{$post->getPostCategory->slug}}/{{$post->slug}}">Read
                                                                more <i class="fal fa-angle-double-right"></i></a>
                                                        </div>
                                                        <div class="beau-article-meta-wrapper">
                                                            <a class="beau-article-meta-date" href="#">
                                                                <span class="time-month"><i class="fal fa-calendar-alt"></i> {{$post->created_at}}</span>
                                                            </a>
                                                            |
                                                            <div class="beau-article-meta-tags">
                                                                <span><i class="fal fa-eye"></i> {{$post->view}} views</span> | <a
                                                                    href="#"><i class="far fa-clipboard-list-check"></i> {{$post->theme}}</a></div>
                                                        </div>
                                                    </div>
                                                </article>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{ $posts->links('vendor.pagination.simple-default') }}
                </article>
            </section>

        </div>
    </div>

</section>
