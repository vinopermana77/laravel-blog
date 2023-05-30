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
                                <a href="{{ url('post_detail', $post->id) }}">
                                    <div class="card-image">
                                        <div class="post-info"> <span class="text-uppercase">{{ date('d M Y',
                                                strtotime($post->created_at)) }}</span>
                                        </div>
                                        <img src="images/{{ $post->image }}" alt="Post Thumbnail"
                                            style="width: 400px; height: 200px;">
                                    </div>
                                </a>
                                <div class="card-body px-0 pb-0">
                                    <ul class="post-meta mb-2">
                                        <li>
                                            <p>Author : <b>{{ $post->name }}</b></p>
                                        </li>
                                    </ul>
                                    <h2>
                                        <h2>{{ $post->title }}</h2>
                                    </h2>
                                    <p class="card-text">{!! Str::limit($post->description,) !!}</p>
                                    <div class="content">
                                        <a class="btn read-more-btn" href="{{ url('post_detail', $post->id) }}">Read
                                            Full
                                            Article</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                    <div class="paginate mt-3">
                        {{ $posts->links('pagination::bootstrap-5') }}
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
                                        <h2 class="widget-title my-3">Alvino Permana Putra</h2>
                                        <p class="mb-3 pb-2">
                                            I am a fresh graduate from Pamulang University
                                            Faculty of computer science
                                            Informatics Engineering</p> <a
                                            href="https://vinopermana77.github.io/MyPortfolio/" target="blank"
                                            class="btn btn-sm btn-outline-primary">Know
                                            More</a>
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