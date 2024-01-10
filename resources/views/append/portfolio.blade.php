<section id="portfolio" class="portfolio">

    <!--  Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Portfolio</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
{{-- 
        <ul class="portfolio-filters" data-aos="fade-up" data-aos-delay="100">
          @if($categories->isNotEmpty())
            @foreach($categories as $category)
            <li data-filter=".filter-active">
              <a href="{{ route('project-categories.show', $category->slug) }}">{{ $category->name }}</a>
            </li>
            @endforeach
          @endif
          
        </ul><!-- End Portfolio Filters --> --}}
        
        @include(env('THEME') . '.portfolio_items', ['items' => $items])
      </div>

    </div>

  </section>