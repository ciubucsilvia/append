<section id="faq" class="faq">

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="content px-xl-5">
            <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
            </p>
          </div>
        </div>

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

          <div class="faq-container">
            @if($questions->isNotEmpty())
            @foreach ($questions as $key => $question)
              <div class="faq-item">
                <h3><span class="num">{{ $key + 1 }}.</span> <span>{{ $question->question }}</span></h3>
                <div class="faq-content">
                  <p>{{ $question->answer  }}</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->
            @endforeach
            @endif
            
          </div>

        </div>
      </div>

    </div>

  </section>