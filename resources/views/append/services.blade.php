<section id="services" class="services">

    <!--  Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Services</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">
        @if($services->isNotEmpty())
          @foreach($services as $service)
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-{{ $service->icon }}"></i></div>
                <div>
                  <h4 class="title"><a href="{{ route('services.show', $service->slug) }}" class="stretched-link">{{ $service->title }}</a></h4>
                  <p class="description">{{ $service->description }}</p>
                </div>
              </div>
            </div>
          <!-- End Service Item -->
          @endforeach
        @endif
      </div>

    </div>

  </section>