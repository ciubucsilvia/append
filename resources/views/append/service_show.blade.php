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
  
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
  
              <div class="service-box">
                <h4>Serices List</h4>
                <div class="services-list">
                  @if($serviceList->isNotEmpty())
                    @foreach ($serviceList as $item)
                      @if($item->slug == $service->slug) @continue @endif
                      <a href="{{ route('services.show', $item->slug) }}"><i class="bi bi-arrow-right-circle"></i><span>{{ $item->title }}</span></a>                      
                    @endforeach
                  @endif
                </div>
              </div><!-- End Services List -->
  
              <div class="service-box">
                <h4>Download Catalog</h4>
                <div class="download-catalog">
                  <a href="{{ route('services.pdf', $service->slug) }}"><i class="bi bi-filetype-pdf"></i><span>Catalog PDF</span></a>
                  {{-- <a href="#"><i class="bi bi-file-earmark-word"></i><span>Catalog DOC</span></a> --}}
                </div>
              </div><!-- End Services List -->
  
              <div class="help-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-headset help-icon"></i>
                <h4>Have a Question?</h4>
                <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+1 5589 55488 55</span></p>
                <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:contact@example.com">contact@example.com</a></span></p>
              </div>
  
            </div>
  
            <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
              <img src="{{ asset('storage/'. env('THEME') . '/images/services/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid services-img">
              {!! $service->content !!}
            </div>
  
          </div>
  
        </div>
  
      </section><!-- End Service-details Section -->