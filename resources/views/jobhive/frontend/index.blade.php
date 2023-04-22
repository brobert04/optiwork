<!DOCTYPE html>
<html lang="en">

@include('jobhive.frontend.partials.header')

<body>

  @include('jobhive.frontend.partials.navbar')

  @include('jobhive.frontend.partials.hero-section');

  <main id="main">

    @include('jobhive.frontend.partials.about')

    <!-- ======= Counts Section ======= -->
      @include('jobhive.frontend.partials.counts')
      <!-- End Counts Section -->


    <!-- ======= Testimonials Section ======= -->
      @include('jobhive.frontend.partials.testimonials')
   <!-- End Testimonials Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
      @include('jobhive.frontend.partials.faq')
    <!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    @include('jobhive.frontend.partials.footer')
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('jobhive.frontend.partials.scripts')
</body>
</html>
