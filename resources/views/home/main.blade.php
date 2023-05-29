<main>
    <section class="section">
        <div class="container">
            <div class="row no-gutters-lg">
                <div class="col-12">
                    <h2 class="section-title">Articles</h2>
                </div>
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-md-6 mb-4">
                            <article class="card article-card article-card-sm h-100">
                                <a href="blog/article.html">
                                    <div class="card-image">
                                        <div class="post-info"> <span class="text-uppercase">03 Jun 2021</span>
                                            <span class="text-uppercase">2 minutes read</span>
                                        </div>
                                        <img loading="lazy" decoding="async" src="images/{{ $post->image }}"
                                            alt="Post Thumbnail" class="w-100">
                                    </div>
                                </a>
                                <div class="card-body px-0 pb-0">
                                    <ul class="post-meta mb-2">
                                        <li>
                                            <p>Author : <b>{{ $post->name }}</b></p>
                                        </li>
                                    </ul>
                                    <h2>
                                        <a class="post-title" href="blog/article.html">{{ $post->title }}</a>
                                    </h2>
                                    <p class="card-text">{!! Str::limit($post->description) !!}</p>
                                    <div class="content"> <a class="read-more-btn" href="blog/article.html">Read
                                            Full
                                            Article</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-blocks">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <img loading="lazy" decoding="async" src="blog/images/author.jpg" alt="About Me"
                                            class="w-100 author-thumb-sm d-block">
                                        <h2 class="widget-title my-3">Hootan Safiyari</h2>
                                        <p class="mb-3 pb-2">Hello, I’m Hootan Safiyari. A Content writter,
                                            Developer and Story teller. Working as a Content writter at CoolTech
                                            Agency. Quam nihil …</p> <a href="blog/about.html"
                                            class="btn btn-sm btn-outline-primary">Know
                                            More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="widget">
                                    <h2 class="section-title mb-3">Recommended</h2>
                                    <div class="widget-body">
                                        <div class="widget-list">
                                            <article class="card mb-4">
                                                <div class="card-image">
                                                    <div class="post-info"> <span class="text-uppercase">1 minutes
                                                            read</span>
                                                    </div>
                                                    <img loading="lazy" decoding="async"
                                                        src="blog/images/post/post-9.jpg" alt="Post Thumbnail"
                                                        class="w-100">
                                                </div>
                                                <div class="card-body px-0 pb-1">
                                                    <h3><a class="post-title post-title-sm"
                                                            href="blog/article.html">Portugal and France Now
                                                            Allow Unvaccinated Tourists</a></h3>
                                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit, sed do eiusmod tempor …</p>
                                                    <div class="content"> <a class="read-more-btn"
                                                            href="blog/article.html">Read Full Article</a>
                                                    </div>
                                                </div>
                                            </article>
                                            <a class="media align-items-center" href="blog/article.html">
                                                <img loading="lazy" decoding="async" src="blog/images/post/post-2.jpg"
                                                    alt="Post Thumbnail" class="w-100">
                                                <div class="media-body ml-3">
                                                    <h3 style="margin-top:-5px">These Are Making It Easier To Visit
                                                    </h3>
                                                    <p class="mb-0 small">Heading Here is example of hedings. You
                                                        can use …</p>
                                                </div>
                                            </a>
                                            <a class="media align-items-center" href="blog/article.html"> <span
                                                    class="image-fallback image-fallback-xs">No Image
                                                    Specified</span>
                                                <div class="media-body ml-3">
                                                    <h3 style="margin-top:-5px">No Image specified</h3>
                                                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing …</p>
                                                </div>
                                            </a>
                                            <a class="media align-items-center" href="blog/article.html">
                                                <img loading="lazy" decoding="async" src="blog/images/post/post-5.jpg"
                                                    alt="Post Thumbnail" class="w-100">
                                                <div class="media-body ml-3">
                                                    <h3 style="margin-top:-5px">Perfect For Fashion</h3>
                                                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing …</p>
                                                </div>
                                            </a>
                                            <a class="media align-items-center" href="blog/article.html">
                                                <img loading="lazy" decoding="async" src="blog/images/post/post-9.jpg"
                                                    alt="Post Thumbnail" class="w-100">
                                                <div class="media-body ml-3">
                                                    <h3 style="margin-top:-5px">Record Utra Smooth Video</h3>
                                                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing …</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="widget">
                                    <h2 class="section-title mb-3">Categories</h2>
                                    <div class="widget-body">
                                        <ul class="widget-list">
                                            <li><a href="blog/#!">computer<span class="ml-auto">(3)</span></a>
                                            </li>
                                            <li><a href="blog/#!">cruises<span class="ml-auto">(2)</span></a>
                                            </li>
                                            <li><a href="blog/#!">destination<span class="ml-auto">(1)</span></a>
                                            </li>
                                            <li><a href="blog/#!">internet<span class="ml-auto">(4)</span></a>
                                            </li>
                                            <li><a href="blog/#!">lifestyle<span class="ml-auto">(2)</span></a>
                                            </li>
                                            <li><a href="blog/#!">news<span class="ml-auto">(5)</span></a>
                                            </li>
                                            <li><a href="blog/#!">telephone<span class="ml-auto">(1)</span></a>
                                            </li>
                                            <li><a href="blog/#!">tips<span class="ml-auto">(1)</span></a>
                                            </li>
                                            <li><a href="blog/#!">travel<span class="ml-auto">(3)</span></a>
                                            </li>
                                            <li><a href="blog/#!">website<span class="ml-auto">(4)</span></a>
                                            </li>
                                            <li><a href="blog/#!">hugo<span class="ml-auto">(2)</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>