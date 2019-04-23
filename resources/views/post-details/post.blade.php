<section class="post-wrapper">
    <div id="main-container">
        <div class="page-content container page-page with-sidebar right-sidebar">
            <section class="beau-mainbar">
                <article id="post-114" class="post-114 page type-page status-publish has-post-thumbnail hentry">
                    <div style="background-attachment: scroll !important;" class="vc_row wpb_row vc_row-fluid vc_custom_1443491139460">
                        <div class="vc_col-sm-12 wpb_column vc_column_container">
                            <div class="wpb_wrapper">
                                <div class='blog-list-style-onecolumn'>
                                    <div class="beau-blogs-list-container" data-posts-per-page="6" data-style="onecolumn">
                                        <article id="post-92" class="beau-post-in-list post-92 post type-post status-publish format-standard has-post-thumbnail hentry category-branding category-photography category-print tag-awesome tag-photography">
                                            <div class="beau-article-content">
                                                <h1 class="beau-article-title"><em>{{$post->title}}</em></h1>
                                                <div class="beau-article-author">By <a href="#" title="Posts by beauwp" rel="author">{{$post->author}}</a></div>
                                                <div class="beau-article-meta-wrapper">
                                                    <a class="beau-article-meta-date" href="javascript:;">
                                                        <span class="time-month">{{$post->created_at}}</span>
                                                    </a>
                                                    |
                                                    <div class="beau-article-meta-tags">
                                                        <a href="#">{{$post->view}} views</a> | <a href="#">{{$post->getPostCategory->theme}}</a> </div>
                                                </div>
                                                <div class="beau-article-excerpt">
                                                     {!! $post->content !!}
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </section>

            <aside class="beau-sidebar">
                <div id="search-2" class="beau-main-sidebar clearfix widget_search">
                    <form  method="get" class="search-form" action="#">
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" title="Search for:" />
                        </label>
                        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div id="recent-posts-2" class="beau-main-sidebar clearfix widget_recent_entries text-justify">
                    <h3>Latest Posts</h3>
                    @foreach($lastedPosts as $lastedPost)
                    <ul>
                        <li>
                            <a href="{{route('app.post')}}/{{$lastedPost->getPostCategory->slug}}/{{$lastedPost->slug}}">{{$lastedPost->title}}</a>
                        </li>
                    </ul>
                        @endforeach
                </div>
                <div id="tag_cloud-2" class="beau-main-sidebar clearfix widget_tag_cloud">
                    <h3>Tags</h3>
                    <div class="tagcloud"><a href='#' class='tag-link-17' title='1 topic' style='font-size: 8pt;'>audio</a>
                        <a href='#' class='tag-link-6' title='1 topic' style='font-size: 8pt;'>awesome</a>
                        <a href='#' class='tag-link-19' title='1 topic' style='font-size: 8pt;'>branding</a>
                        <a href='#' class='tag-link-22' title='1 topic' style='font-size: 8pt;'>gallery</a>
                        <a href='#' class='tag-link-9' title='4 topics' style='font-size: 22pt;'>photography</a>
                        <a href='#' class='tag-link-20' title='1 topic' style='font-size: 8pt;'>video</a>
                        <a href='#' class='tag-link-16' title='1 topic' style='font-size: 8pt;'>website</a></div>
                </div>
                <div id="categories-2" class="beau-main-sidebar clearfix widget_categories">
                    <h3>Categories</h3>
                    <ul>
                        <li class="cat-item cat-item-18"><a href="#">{{$post->getPostCategory->theme}}</a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
