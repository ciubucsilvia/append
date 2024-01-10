<section id="team" class="team">

    <!--  Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Team</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-5">
        @if($team->isNotEmpty())
          @foreach($team as $person)
            <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ asset('storage/'. env('THEME') . '/images/team/' . $person->image) }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="{{ $person->social_twitter }}"><i class="bi bi-twitter"></i></a>
                  <a href="{{ $person->social_facebook }}"><i class="bi bi-facebook"></i></a>
                  <a href="{{ $person->social_instagram }}"><i class="bi bi-instagram"></i></a>
                  <a href="{{ $person->social_linkedin }}"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info text-center">
                <h4>{{ $person->name }}</h4>
                <span>{{ $person->occupation }}</span>
                <p>{{ $person->description }}</p>
              </div>
            </div><!-- End Team Member -->
          @endforeach
        @endif
 
      </div>

    </div>

  </section>
  