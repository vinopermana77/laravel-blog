<!DOCTYPE html>
<html lang="en-us">

<head>
    @include('home.homecss')
</head>

<body>

    {{-- Header --}}
    @include('home.header')
    {{-- Header --}}

    {{-- Main --}}
    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto mb-5 mb-lg-0">
                        <img loading="lazy" decoding="async" src="blog/images/author.jpg" class="img-fluid w-100 mb-4"
                            alt="Author Image">
                        <h1 class="mb-4">Alvino Permana Putra</h1>
                        <div class="content">
                            <p>I am a fresh graduate from Pamulang University
                                Faculty of computer science
                                Informatics Engineering</p>
                            <blockquote>
                                <p>Programmer</p>
                            </blockquote>
                            <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam nihil enim
                                maxime corporis
                                cumque totam aliquid nam sint inventore optio modi neque laborum officiis
                                necessitatibus, facilis placeat pariatur! Voluptatem, sed harum pariatur adipisci
                                voluptates voluptatum cumque, porro sint minima similique magni perferendis fuga! Optio
                                vel ipsum excepturi tempore reiciendis id quidem.</p>
                            <a href="https://vinopermana77.github.io/MyPortfolio/" target="blank"
                                class="btn btn-sm btn-outline-primary">Know
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- Main --}}

    {{-- Footer --}}
    @include('home.footer')
    {{-- Footer --}}

</body>

</html>