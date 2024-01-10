<section id="recent-posts" class="recent-posts">

    <!--  Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Recent Posts</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">
        @if($posts->isNotEmpty())
          @foreach ($posts as $post)
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <article>

                <div class="post-img">
                  <img src="{{ asset('storage/'. env('THEME') . '/images/posts/' . $post->image) }}" 
                    alt="{{ $post->title }}" 
                    class="img-fluid">
                </div>

                <a href="{{ route('post-categories.show', $post->category->slug) }}">
                  <p class="post-category">{{ $post->category->name }}</p>
                </a>

                <h2 class="title">
                  <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                </h2>

                <div class="d-flex align-items-center">
                  <img src="{{ asset('storage/'. env('THEME') . '/images/posts/' . $post->image) }}" 
                    alt="{{ $post->title }}" 
                    class="img-fluid post-author-img flex-shrink-0">
                  <div class="post-meta">
                    <p class="post-author">{{ $post->user->name }}</p>
                    <p class="post-date">
                      <time datetime="{{ $post->published_at }}">{{ $post->getDate()}}</time>
                    </p>
                  </div>
                </div>

              </article>
            </div><!-- End post list item -->
          @endforeach
        @endif

      </div><!-- End recent posts list -->

    </div>

  </section>