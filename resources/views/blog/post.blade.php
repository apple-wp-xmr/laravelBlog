@extends('layouts.blog')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{ $post->date }}• Featured • 4 Comments
            </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <div class="post-content">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach ($relatedPosts as $post)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="related post"
                                        class="post-thumbnail">
                                    <p class="post-category">{{ $post->category->name }}</p>
                                    <a href="{{ route('blog.show', $post->id) }}" class="blog-post-permalink">
                                        <h6 class="post-title">{{ $post->title }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </main>
@endsection
