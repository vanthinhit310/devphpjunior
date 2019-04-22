<section class="blog-wrapper">

    <div id="main-container">
        <div class="page-content container page-page">
            <section class="beau-mainbar">
                <blockquote>{{$about->blog_qoutes}}</blockquote>
                <article id="post-1731" class="post-1731 page type-page status-publish hentry">

                    <div style="background-attachment: scroll !important;" class="vc_row wpb_row vc_row-fluid vc_custom_1443666427953">
                        <div class="vc_col-sm-12 wpb_column vc_column_container">
                            <div class="wpb_wrapper">
                                <div class='blog-list-style-masonry'>
                                    <div class="beau-blogs-list-container" data-posts-per-page="6" data-style="masonry">
                                        <div class='blog-list-isotope-container masonry-2-columns'>
                                            @foreach($posts as $post)
                                            <article id="post-92" class="beau-post-in-list post-92 post type-post status-publish format-standard has-post-thumbnail hentry category-branding category-photography category-print tag-awesome tag-photography">
                                                <div class="beau-article-featured-wrapper">
                                                    <img width="1920" height="900" src="{{$post->image}}" class="attachment-post-thumbnail wp-post-image" alt="{{$post->title}}" /> </div>
                                                <div class="beau-article-content">
                                                    <h2 class="beau-article-title"><a href="#"><em>{{$post->title}}</em></a></h2>
                                                    <div class="beau-article-author">By <a href="#/" title="Posts by beauwp" rel="author">{{$post->author}}</a></div>
                                                    <div class="beau-article-excerpt">
                                                        <p>{{$post->description}}</p>
                                                        <div class="excerpt-more-wrapper"><a class="beau-button" href="#">Read More</a></div>
                                                    </div>
                                                    <div class="beau-article-meta-wrapper">
                                                        <a class="beau-article-meta-date" href="#">
                                                            <span class="time-month">{{$post->created_at}}</span>
                                                        </a>
                                                        |
                                                        <div class="beau-article-meta-tags">
                                                            <span>{{$post->view}} views</span> | <a href="#">{{$post->theme}}</a> </div>
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
                    {{--<nav class="navigation pagination"><a class="beau-btn-load-more" href="#" data-posts-per-page="6">Load More</a></nav>--}}
                </article>
            </section>

        </div>
    </div>

</section>
