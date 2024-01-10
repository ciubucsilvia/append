    <!-- Services Details Page Title & Breadcrumbs -->
    <div data-aos="fade" class="page-title">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <h1>{{ $service->title }}</h1>
                <p class="mb-0">{{ $service->description }}</p>
              </div>
            </div>
          </div>
        </div>
        {{-- <nav class="breadcrumbs">
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li class="current">Services Details</li>
            </ol>
          </div>
        </nav> --}}
      </div><!-- End Page Title -->
  
      <!-- Service-details Section - Services Details Page -->
      <section id="service-details" class="service-details">
  
        <div class="container">
  
          <div class="row gy-5">
  
            <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
              <img src="{{ asset('storage/'. env('THEME') . '/images/services/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid services-img">
              {!! $service->content !!}
            </div>
  
          </div>
  
        </div>
  
      </section><!-- End Service-details Section -->