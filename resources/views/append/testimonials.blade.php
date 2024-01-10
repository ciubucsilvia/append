<section id="testimonials" class="testimonials">

    <div class="container">

      <div class="row align-items-center">

        <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
          <h3>Testimonials</h3>
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
          </p>
        </div>

        <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

          <div class="swiper">
            <template class="swiper-config">
              {
              "loop": true,
              "speed" : 600,
              "autoplay": {
              "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
              }
              }
            </template>
            <div class="swiper-wrapper">

              @if($testimonials->isNotEmpty())
                @foreach ($testimonials as $testimonial)
                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <div class="d-flex">
                        <img src="{{ asset('storage/'. env('THEME') . '/images/testimonials/' . $testimonial->image) }}" class="testimonial-img flex-shrink-0" alt="">
                        <div>
                          <h3>{{ $testimonial->name }}</h3>
                          <h4>{{ $testimonial->occupation }}</h4>
                          <div class="stars">
                            @for($i = 1; $i <= 5; $i++) 
                              @if($i <= $testimonial->rating) 
                                <i class="bi bi-star-fill"></i>
                              @else
                                <i class="bi bi-star"></i>
                              @endif
                            @endfor
                          </div>
                        </div>
                      </div>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>{{ $testimonial->message }}</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div><!-- End testimonial item -->  
                @endforeach
              @endif

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>

      </div>

    </div>

  </section>