@if($items->isNotEmpty())
    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
    @foreach($items as $item)
        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
        
        <img src="{{ asset('storage/'. env('THEME') . '/images/projects/' . $item->getImages()[0]) }}" class="img-fluid" alt="">
        <div class="portfolio-info">
            <h4>{{ $item->title }}</h4>
            <p>{{ $item->category->name }}</p>
            <a href="{{ asset('storage/'. env('THEME') . '/images/projects/' . $item->getImages()[0]) }}" title="{{ $item->title }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="{{ route('projects.show', $item->slug) }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
        </div>
        </div><!-- End Portfolio Item -->
    @endforeach
    </div><!-- End Portfolio Container -->
    
    <div class="pagination d-flex justify-content-center">
        {{ $items->links() }}
    </div>
@endif