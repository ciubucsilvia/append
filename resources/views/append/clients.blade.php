<section id="clients" class="clients">

    <div class="container-fluid" data-aos="fade-up">

      <div class="row gy-4">
        @if($clients->isNotEmpty())
          @foreach($clients as $client)
          <!-- Client Item -->
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('storage/'. env('THEME') . '/images/clients/' . $client->image) }}"  class="img-fluid" alt="">
          </div>
          <!-- End Client Item -->
          @endforeach
        @endif
      </div>

    </div>

  </section>