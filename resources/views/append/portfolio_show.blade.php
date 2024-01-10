    <!-- Portfolio Details Page Title & Breadcrumbs -->
    <div data-aos="fade" class="page-title">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <h1>{{ $project->title }}</h1>
                <p class="mb-0">{{ $project->description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Page Title -->
  
      <!-- Portfolio-details Section - Portfolio Details Page -->
      <section id="portfolio-details" class="portfolio-details">
  
        <div class="container" data-aos="fade-up">
  
          <div class="portfolio-details-slider swiper">
            <template class="swiper-config">
              {
              "loop": true,
              "speed" : 600,
              "autoplay": {
              "delay": 5000
              },
              "slidesPerView": "auto",
              "navigation": {
              "nextEl": ".swiper-button-next",
              "prevEl": ".swiper-button-prev"
              }
              }
            </template>
            <div class="swiper-wrapper align-items-center">
                @foreach($project->getImages() as $image)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/'. env('THEME') . '/images/projects/' . $image) }}" alt="{{ $project->title }}">
                </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
  
          <div class="row justify-content-between gy-4 mt-4">
  
            <div class="col-lg-8" data-aos="fade-up">
              <div class="portfolio-description">
                {!! $project->content !!}

                @if($testimonial)
                  <div class="testimonial-item">
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>{{ $testimonial->message }}</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <div>
                      <img src="{{ asset('storage/'. env('THEME') . '/images/testimonials/' . $testimonial->image) }}" class="testimonial-img" alt="">
                      <h3>{{ $testimonial->name }}</h3>
                      <h4>{{ $testimonial->occupation }}</h4>
                    </div>
                  </div>
                @endif
              </div>
            </div>
  
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="portfolio-info">
                <h3>Project information</h3>
                <ul>
                  <li><strong>Category</strong> <a href="{{ route('project-categories.show', $project->category->slug) }}">{{ $project->category->name }}</a></li>
                  <li><strong>Client</strong> {{ $project->client->name }}</li>
                  <li><strong>Project date</strong> {{ $project->getDate() }}</li>
                  <li><strong>Project URL</strong> <a href="{{ $project->url }}">{{ $project->url }}</a></li>
                  <li><a href="{{ $project->url }}" class="btn-visit align-self-start">Visit Website</a></li>
                </ul>
              </div>
            </div>
  
          </div>
  
        </div>
  
      </section><!-- End Portfolio-details Section -->