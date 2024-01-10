<section id="features" class="features">

    <!--  Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Features</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container">
      @if($features->isNotEmpty())
        @foreach ($features as $feature)
          @if($loop->first)
            <div class="row gy-4 align-items-center features-item">
              <div class="col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h3>{{ $feature->title }}</h3>
                {!! $feature->content !!}
              </div>
              <div class="col-lg-7 order-1 order-lg-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                <div class="image-stack">
                  <img src="{{ asset('storage/'. env('THEME') . '/images/features/' . $feature->image) }}" alt="" class="stack-front">
                  <img src="{{ asset('storage/'. env('THEME') . '/images/features/' . $feature->image) }}" alt="" class="stack-back">
                </div>
              </div>
            </div><!-- Features Item -->
          @endif
          @if($loop->last)
            <div class="row gy-4 align-items-stretch justify-content-between features-item ">
              <div class="col-lg-6 d-flex align-items-center features-img-bg" data-aos="zoom-out">
                <img src="{{ asset('storage/'. env('THEME') . '/images/features/' . $feature->image) }}" class="img-fluid" alt="">
              </div>
              <div class="col-lg-5 d-flex justify-content-center flex-column" data-aos="fade-up">
                <h3>{{ $feature->title }}</h3>
                {!! $feature->content !!}
              </div>
            </div><!-- Features Item -->
          @endif
        @endforeach
      @endif
    </div>

  </section>
  