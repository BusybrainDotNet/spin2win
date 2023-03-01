
<?php if (isset($coyInfo['phone'])) { ?>
  <!-- Bothelp.io widget -->
  <script type="text/javascript">!function(){var e={"token":"<?= $coyInfo['phone']; ?>","position":"left","bottomSpacing":"50","callToActionMessage":"We Are Here To Help!","displayOn":"everywhere","subtitle":"At <?= getenv('APP_NAME'); ?>, We Offer The Most Professional Construction Engineering, Buying & Selling of Real Estate & Properties.","message":{"name":"<?= $coyInfo['coyname']; ?>","content":"Welcome To <?= $coyInfo['coyname']; ?>! How Can We Be Of Help To You Today?"}},t=document.location.protocol+"//bothelp.io",o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=t+"/widget-folder/widget-whatsapp-chat.js",o.onload=function(){BhWidgetWhatsappChat.init(e)};var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(o,n)}();</script>
  <!-- /Bothelp.io widget -->
<?php } ?>




  <!--/w3l-footer-29-main-->
  <footer>
    <!-- footer -->
    <section class="w3l-footer">
      <div class="w3l-footer-16-main py-5">
        <div class="container">
          <div class="d-flex below-section justify-content-between align-items-center pt-4 mt-5">
            <div class="columns text-lg-left text-center">
              <p>
                 <strong>&copy; Copyright <span> <script type="text/JavaScript">
                document.write(new Date().getFullYear());
                </script> <?= trim(getenv('APP_NAME'));?></span>. All Rights Reserved </strong> </span> <br> Powered By <a href="<?= getenv('DV_LINK')?>" target="_blank"><?= getenv('DV_NAME')?></a>
            </div>
            <div class="columns-2 mt-lg-0 mt-3">
              <ul class="social">

                 <?php 
            if (!empty($coyInfo['facebook'])) {
                // code...
                echo('<li class="social-icons-facebook"><a href="https://facebook.com/'.$coyInfo['facebook'].'" target="_blank" title="Instagram"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>');
              }
             ?>
             <?php 
                if (!empty($coyInfo['instagram'])) {
                    // code...
                    echo('<li class="social-icons-instagram"><a href="https://instagram.com/'.$coyInfo['instagram'].'" target="_blank" title="Instagram" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span></a></li>');
                  }
             ?>
             <?php 
                if (!empty($coyInfo['linkedin'])) {
                    // code...
                    echo('<li class="social-icons-linkedin"><a href="https://linkedin.com/'.$coyInfo['linkedin'].'" target="_blank" title="Linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>');
                  }
             ?>
             <?php 
                if (!empty($coyInfo['twitter'])) {
                    // code...
                    echo('<li class="social-icons-twitter"><a href="https://twitter.com/'.$coyInfo['twitter'].'" target="_blank" title="twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>');
                  }
             ?>


              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- move top -->
      <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-angle-up"></span>
      </button>
      <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
          scrollFunction()
        };

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
          } else {
            document.getElementById("movetop").style.display = "none";
          }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
      </script>
      <!-- //move top -->
      <script>
        $(function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>
    </section>
    <!-- //footer -->
  </footer>
  <!--//w3l-footer-29-main-->
  <!-- Template JavaScript -->
  <script src="<?= public_asset('/other_assets/front/assets/js/jquery-3.3.1.min.js') ?>"></script>
  <script src="<?= public_asset('/other_assets/front/assets/js/theme-change.js') ?>"></script>
  <script src="<?= public_asset('/other_assets/front/assets/js/owl.carousel.js') ?>"></script>
  
  
  
  <!-- script for banner slider-->
  <script>
    $(document).ready(function () {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: true
          },
          1000: {
            items: 1,
            nav: true
          }
        }
      })
    })
  </script>
  <!-- //script -->
  <!-- script for tesimonials carousel slider -->
  <script>
    $(document).ready(function () {
      $("#owl-demo1").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          736: {
            items: 2,
            nav: false
          },
          1000: {
            items:2,
            nav: false,
            loop: true
          }
        }
      })
    })
  </script>
  <!-- //script for tesimonials carousel slider -->

  <!-- video popup -->
  <script src="<?= public_asset('/other_assets/front/assets/js/jquery.magnific-popup.min.js') ?>"></script>

  <script>
    $(document).ready(function () {
      $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
      });

      $('.popup-with-move-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-slide-bottom'
      });
    });
  </script>
  <!-- //video popup -->
  <!-- stats number counter-->
  <script src="<?= public_asset('/other_assets/front/assets/js/jquery.waypoints.min.j') ?>"></script>
  <script src="<?= public_asset('/other_assets/front/assets/js/jquery.countup.js ') ?>"></script>
  <script>
    $('.counter').countUp();
  </script>
  <!-- //stats number counter -->
  <!--/MENU-JS-->
  <script>
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 80) {
        $("#site-header").addClass("nav-fixed");
      } else {
        $("#site-header").removeClass("nav-fixed");
      }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
      $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
      $(window).on("resize", function () {
        if ($(window).width() > 991) {
          $("header").removeClass("active");
        }
      });
    });
  </script>
  <!--//MENU-JS-->

  <script src="<?= public_asset('/other_assets/front/assets/js/bootstrap.min.js') ?>"></script>


</body>

</html>