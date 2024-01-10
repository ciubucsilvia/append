    <!-- Blog Details Page Title & Breadcrumbs -->
    <div data-aos="fade" class="page-title">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <h1>{{ $post->title }}</h1>
                <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Page Title -->
  
      <!-- Blog-details Section - Blog Details Page -->
      <section id="blog-details" class="blog-details">
  
        <div class="container" data-aos="fade-up" data-aos-delay="100">
  
          <div class="row g-5">
  
            <div class="col-lg-8">
  
              <article class="article">
  
                <div class="post-img">
                  <img src="{{ asset('storage/' . env('THEME') . '/images/posts/' . $post->image) }}" 
                  alt="{{ $post->title }}" 
                  class="img-fluid">
                </div>
  
                <h2 class="title">{{ $post->title }}</h2>
  
                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i>{{ $post->user->name }}</li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="2020-01-01">{{ $post->getDate() }}</time></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#comments">{{ $post->comments->count() }} Comments</a></li>
                  </ul>
                </div><!-- End meta top -->
  
                <div class="content">
                  {!! $post->content !!}
                </div><!-- End post content -->
  
                <div class="meta-bottom">
                  <i class="bi bi-folder"></i>
                  <ul class="cats">
                    <li><a href="{{ route('post-categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></li>
                  </ul>
  
                  <i class="bi bi-tags"></i>
                  <ul class="tags">
                    @foreach($post->tags as $tag)
                        <li><a href="{{ route('tags.show', $tag->slug) }}">{{ $tag->name }}</a></li>
                    @endforeach
                  </ul>
                </div><!-- End meta bottom -->
  
              </article><!-- End post article -->
  
              <div class="blog-author d-flex align-items-center">
                <img src="{{ asset('storage/' . env('THEME') . '/images/team/' . $post->user->image) }}" class="rounded-circle flex-shrink-0" alt="">
                <div>
                  <h4>{{ $post->user->name }}</h4>
                  <div class="social-links">
                    <a href="{{ $post->user->social_twitter }}"><i class="bi bi-twitter"></i></a>
                    <a href="{{ $post->user->social_facebook }}"><i class="bi bi-facebook"></i></a>
                    <a href="{{ $post->user->social_instagram }}"><i class="biu bi-instagram"></i></a>
                  </div>
                  <p>
                    {{ $post->user->description }}
                  </p>
                </div>
              </div><!-- End post author -->
  
              <div class="comments" id="comments">
  
                <h4 class="comments-count">{{ $post->comments->count() }} Comments</h4>
                
                @if($post->comments->count() > 0)
                  @foreach($comments as $comment)
                    <div id="comment-1" class="comment">
                      <div class="d-flex">
                        <div class="comment-img"><img src="{{ asset('storage' . env('THEME') . '/images/comment_users/' . $comment->image) }}" alt=""></div>
                        <div>
                          <h5><a href="">{{ $comment->name }}</a></h5>
                          <time datetime="{{ $comment->created_at }}">{{ $comment->getDate() }}</time>
                          <p>
                            {{ $comment->comment }}
                          </p>
                        </div>
                      </div>
                    </div><!-- End comment #1 -->
                  @endforeach
                @endif
  
                <div class="reply-form">
  
                  <h4>Leave a Reply</h4>
                  <p>Your email address will not be published. Required fields are marked * </p>
                  <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input name="post_id" type="hidden" class="form-control" value="{{ $post->id }}">
                    <input name="post_slug" type="hidden" class="form-control" value="{{ $post->slug }}">
                    
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input name="name" type="text" class="form-control" placeholder="Your Name*" value="{{ old('name') }}">
                        <span class="text-danger">
                          @error('name') {{ $message }} @enderror
                      </span>
                      </div>
                      <div class="col-md-6 form-group">
                        <input name="email" type="text" class="form-control" placeholder="Your Email*" value="{{ old('email') }}">
                        <span class="text-danger">
                          @error('email') {{ $message }} @enderror
                      </span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col form-group">
                        <input name="website" type="text" class="form-control" placeholder="Your Website" value="{{ old('website') }}">
                        <span class="text-danger">
                          @error('website') {{ $message }} @enderror
                      </span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col form-group">
                        <textarea name="comment" class="form-control" placeholder="Your Comment*">{{ old('comment') }}</textarea>
                        <span class="text-danger">
                          @error('comment') {{ $message }} @enderror
                      </span>
                      </div>
                    </div>
  
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Post Comment</button>
                    </div>
  
                  </form>
  
                </div>
  
              </div><!-- End blog comments -->
  
            </div>
  
            <div class="col-lg-4">
  
              <div class="sidebar">
  
                <div class="sidebar-item categories">
                  <h3 class="sidebar-title">Categories</h3>
                  <ul class="mt-3">
                    @if($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            @if($category->posts->count() > 0)
                                <li><a href="{{ route('post-categories.show', $category->slug) }}">{{ $category->name }} <span>({{ $category->posts->count() }})</span></a></li>
                            @endif
                        @endforeach
                    @endif
                  </ul>
                </div><!-- End sidebar categories-->
  
                <div class="sidebar-item recent-posts">
                  <h3 class="sidebar-title">Recent Posts</h3>
                    
                    @if($recentPosts->isNotEmpty())
                        @foreach($recentPosts as $item)
                            <div class="post-item">
                                <img src="{{ asset('storage/' . env('THEME') . '/images/posts/' . $item->image) }}" alt="{{ $item->title }}" class="flex-shrink-0">
                                <div>
                                <h4><a href="{{ route('posts.show', $item->slug) }}">{{ $item->title }}</a></h4>
                                <time datetime="{{ $item->published_at }}">{{ $item->getDate() }}</time>
                                </div>
                            </div><!-- End recent post item-->
                        @endforeach
                    @endif
  
                </div><!-- End sidebar recent posts-->
  
                <div class="sidebar-item tags">
                  <h3 class="sidebar-title">Tags</h3>
                  <ul class="mt-3">
                    @if($tags->isNotEmpty())
                        @foreach($tags as $tag)
                            <li><a href="{{ route('tags.show', $tag->slug) }}">{{ $tag->name }}</a></li>
                        @endforeach
                    @endif
                  </ul>
                </div><!-- End sidebar tags-->
  
              </div><!-- End Sidebar -->
  
            </div>
  
          </div>
  
        </div>
  
      </section><!-- End Blog-details Section -->