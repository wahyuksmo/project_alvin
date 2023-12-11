 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">Welcome to <span>Bintang Muara</span></h2>
            <a data-aos="fade-up" data-aos-delay="200" href="" class="btn-get-started">Get Started</a>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-intenrval="5000">

   
      <?php $i=0; foreach ($banner as $bnr): ?>
      <?php if ($i==0) {$set_ = 'active'; } else {$set_ = ''; } ?> 
    
      <div class="carousel-item <?php echo $set_; ?>" style="background-image: url(<?= asset('storage/'. $bnr->banner_image) ?>)"></div>
      <?php $i++; endforeach ?>

      

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->