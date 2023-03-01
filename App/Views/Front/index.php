<?php 

include 'layout/top.php'; 
include 'layout/navbar.php';  

?>

<title>Home | Welcome | <?= getenv('APP_NAME'); ?></title>


<?php include 'slider.php';  ?>


 <!--/grids-->
  <section class="w3l-grids-3 py-5" id="about">
    <div class="container py-md-5">
      <div class="row bottom-ab-grids align-items-center">
        <div class="col-lg-6 bottom-ab-left pr-lg-5">
          <h6 class="sub-title">About Us</h6>
          <h3 class="hny-title">At <?= trim(getenv('APP_NAME')); ?>, We are advocates for improving the world around us.</h3>
          <p class="my-3 pr-lg-4">This synergy allows us to seamlessly provide engineering solutions to shop drawing submittals and design-build solutions for unique projects. We take pride in our work and strive for quality with every step.
          Our professional brandtenders help with expert guidance, out-of-the-box perspectives, seamless execution, deadline-focused delivery, and centralized communication facilitated by offices across the country and a growing international presence. 
          </p>
          <a href="<?= baseURL('about-us/'); ?>" class="btn btn-style btn-secondary mt-4">Read More</a>
        </div>
        <div class="col-lg-6 bottom-ab-right mt-lg-0 mt-5">
          <img src="/Images/other5.jpeg" class="img-fluid" alt="About Us"> 
        </div>

      </div>
    </div>
  </section>
  <!--//grids-->



    <!--/get -->
  <section class="w3l-grid-quote text-center py-5">
    <div class="container py-3">
      <h6 class="sub-title text-center">Have an Idea In Mind?</h6>
      <h3 class="hny-title mb-md-5 mb-4">Let's Discuss Your Idea! <br> Contact Us.</h3>
      <a href="<?= baseURL('hire-us/'); ?>" class="btn btn-style btn-primary mr-2">Hire Us</a>
      <a href="<?= baseURL('hire-us/'); ?>" class="btn btn-style btn-outline-primary">Get in touch</a>
    </div>
  </section>
  <!--//get -->


  <!--/services-->
    <section class="w3l-features14">
    <div class="w3l-feature-6-main py-5">
      <div class="container py-lg-5">
        <div class="wrapper-max">
          <div class="header-section text-center mb-5">
            <h6 class="sub-title">Services We Do</h6>
            <h3 class="hny-title two">
              Services We Offer
            </h3>
          </div>
          <div class="grid mt-lg-4">
            <div class="w3l-feature-6-gd">
              <div class="icon"><span class="fa fa-cogs"></span></div>
              <div class="w3l-feature-6-gd-info">
                <h3><a href="#url">Construction</a></h3>
                <p class="pr-lg-5"> We share a deep belief that construction, when executed thoughtfully, builds community and contributes to the fiber that elevates and holds society together. Regardless of complexity, we present options for each scenario along with realistic cost estimates. 
                </p>
              </div>
            </div>
            <div class="w3l-feature-6-gd">
              <div class="icon"><span class="fa fa-home"></span></div>
              <div class="w3l-feature-6-gd-info">
                <h3><a href="#url">Building Engineering</a></h3>
                <p class="pr-lg-5">Our desire is to create and advocate for responsible architecture; architecture that advances the quality of our world, our ability to perceive it and our relationship to it.</p>
              </div>
            </div>
            <div class="w3l-feature-6-gd">
              <div class="icon"><span class="fa fa-money"></span></div>
              <div class="w3l-feature-6-gd-info">
                <h3><a href="#url">Sales & Lease</a></h3>
                <p class="pr-lg-5">We are committed to providing our clients an exceptional experience throughout the leasing, buying or selling process of the project. We actively listen and strive for clear communication coupled with satisfactory services.</p>
              </div>
            </div>
            <div class="w3l-feature-6-gd">
              <div class="icon"><span class="fa fa-pie-chart"></span></div>
              <div class="w3l-feature-6-gd-info">
                <h3><a href="#url">Interior Designs</a></h3>
                <p class="pr-lg-5">We embrace projects that contribute a “greater good” within our local and international communities by actively pursuing work that allows the firm to contribute responsible, modern and elegant design solutions that benefit others. “Interior Designs is not just a design philosophy; it’s an entirely new way of thinking – and living.</p>
              </div>
            </div>
            
          </div>

        </div>

        <a href="<?= baseURL('our-services/'); ?>" class="btn btn-style mt-lg-4 mt-2">Read More</a>

      </div>
    </div>
  </section>
  <!--//services-->


<?php include 'hire-us-link.php'; ?>



<?php include 'catalogue-display.php'; ?>


  <!-- testimonials -->
  <section class="w3l-clients" id="clients">
    <!-- /grids -->
    <div class="cusrtomer-layout py-5">
      <div class="container py-lg-4 py-md-3 pb-lg-0">
        <div class="heading text-center mx-auto">
          <h6 class="sub-title text-center">Here’s what they have to say</h6>
          <h3 class="hny-title mb-md-5 mb-4">our clients do the talking</h3>
        </div>
        <!-- /grids -->
        <div class="testimonial-width mt-5">
          <div id="owl-demo1" class="owl-two owl-carousel owl-theme">
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <blockquote>
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    <?= getenv('APP_NAME'); ?> worked closely with us every step of the way to ensure our home was not only beautiful and sustainable but also a real manifestation of our vision and our lifestyle.
                  </blockquote>
                  <div class="testi-des">
                    <div class="test-img"><img src="/Images/favicon.png" class="img-fluid" alt="client-img">
                    </div>
                    <div class="peopl align-self">
                      <h3>Rohit Ellis</h3>
                      <p class="indentity">Magodo.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <blockquote>
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    <?= getenv('APP_NAME'); ?> are professionals and they provide an accurate and ongoing description of the design process throughout the project to eliminate surprises. Thumbs up guys!
                  </blockquote>
                  <div class="testi-des">
                    <div class="test-img"><img src="/Images/favicon.png" class="img-fluid" alt="client-img">
                    </div>
                    <div class="peopl align-self">
                      <h3>Shveta Maribela</h3>
                      <p class="indentity">Panama</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <blockquote>
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    We worked collaboratively on different projects and enter into each project with a fresh perspective. <?= getenv('APP_NAME'); ?>'s team bring inspiring ideas, and we always want to listen and learn from them.
                  </blockquote>
                  <div class="testi-des">
                    <div class="test-img"><img src="/Images/favicon.png" class="img-fluid" alt="client-img">
                    </div>
                    <div class="peopl align-self">
                      <h3>Micheal Ramon</h3>
                      <p class="indentity">Abuja</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- /grids -->
    </div>
    <!-- //grids -->
  </section>
  <!-- //testimonials -->





<?php include 'hire-us-link.php'; ?>


<?php include 'selling-now-link.php'; ?>


<?php 

include 'layout/footer.php'; 

?>