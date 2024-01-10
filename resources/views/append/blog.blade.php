
    <!-- Blog Page Title & Breadcrumbs -->
    <div data-aos="fade" class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Blog</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Page Title -->

    <!-- Blog Section - Blog Page -->
    <section id="blog" class="blog">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 posts-list">

          @if($posts->isNotEmpty())
            @foreach($posts as $post)
              <div class="col-xl-4 col-lg-6">
                <article>

                  <div class="post-img">
                    <img src="{{ asset('storage/' . env('THEME') . '/images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                  </div>

                  <p class="post-category">{{ $post->category->name }}</p>

                  <h2 class="title">
                    <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                  </h2>

                  <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/' . env('THEME') . '/images/team/' . $post->user->image) }}" alt="" class="img-fluid post-author-img flex-shrink-0">
                    <div class="post-meta">
                      <p class="post-author">{{ $post->user->name }}</p>
                      <p class="post-date">
                        <time datetime="{{ $post->published_at }}">{{ $post->getDate() }}</time>
                      </p>
                    </div>
                  </div>

                </article>
              </div><!-- End post list item -->
            @endforeach
          @endif

        </div><!-- End blog posts list -->

        <div class="pagination d-flex justify-content-center">
          {{ $posts->links() }}
        </div><!-- End pagination -->

      </div>

    </section><!-- End Blog Section -->