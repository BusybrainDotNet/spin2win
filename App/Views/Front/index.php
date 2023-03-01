<?php 

include 'layout/top.php'; 
include 'layout/navbar.php';  

?>

<title>Home | Welcome | <?= getenv('APP_NAME'); ?></title>


 <!--/grids-->
  <section class="w3l-grids-3 py-5" id="about">
    <div class="container py-md-5">
      <div class="row bottom-ab-grids align-items-center">
        <div class="col-lg-6 bottom-ab-left pr-lg-5">
          <h6 class="sub-title">Welcome To <?= trim(getenv('APP_NAME')); ?> </h6>
          <h3 class="hny-title">SPIN AND WIN <br>CASH PRIZES</h3>
          <p class="my-3 pr-lg-4">
            Spin The Lucky Wheel And Win Real Money And Gifts Prizes Instantly!
          </p>
          <a href="<?= baseURL('how-to-play/'); ?>" class="btn btn-style btn-secondary mt-4">Learn How To Play</a>
        </div>
        <div class="col-lg-6 bottom-ab-right mt-lg-0 mt-5">
          <link rel="stylesheet" href="<?= public_asset('/other_assets/front/assets/spinner/main.css') ?>" type="text/css" />
          <script type="text/javascript" src="<?= public_asset('/other_assets/front/assets/spinner/winwheel.js') ?>"></script>
          <script src="<?= public_asset('/other_assets/front/assets/spinner/TweenMax.min.js') ?>"></script>

          <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td>
                    <div class="power_controls">
                        <br />
                        <br />
                        <table class="power" cellpadding="10" cellspacing="0">
                            <tr>
                                <th align="center">Place Stake</th>
                            </tr>
                            <tr>
                                <td width="78" align="center" id="pw3" onClick="powerSelected(3);">$50</td>
                            </tr>
                            <tr>
                                <td align="center" id="pw2" onClick="powerSelected(2);">$25</td>
                            </tr>
                            <tr>
                                <td align="center" id="pw1" onClick="powerSelected(1);">$10</td>
                            </tr>
                        </table>
                        <br />
                        <img id="spin_button" src="/Images/spin_off.png" alt="Spin" onClick="startSpin();" />
                        <br /><br />
                        <a href="#" onClick="resetWheel(); return false;">Play Again</a><br />(RESET)
                    </div>
                </td>
                <td width="438" height="582" class="the_wheel" align="center" valign="center">
                    <canvas id="canvas" width="434" height="434">
                        <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                    </canvas>
                </td>
            </tr>
        </table>
        <script>
            // Create new wheel object specifying the parameters at creation time.
            let theWheel = new Winwheel({
                'outerRadius'     : 212,        // Set outer radius so wheel fits inside the background.
                'innerRadius'     : 75,         // Make wheel hollow so segments don't go all way to center.
                'textFontSize'    : 16,         // Set default font size for the segments.
                'textOrientation' : 'vertical', // Make text vertial so goes down from the outside of wheel.
                'textAlignment'   : 'outer',    // Align text to outside of wheel.
                'numSegments'     : 24,         // Specify number of segments.
                'segments'        :             // Define segments including colour and text.
                [                               // font size and test colour overridden on backrupt segments.
                   {'fillStyle' : '#ee1c24', 'text' : 'X3'},
                   {'fillStyle' : '#3cb878', 'text' : 'X4.5'},
                   {'fillStyle' : '#f6989d', 'text' : 'X6'},
                   {'fillStyle' : '#00aef0', 'text' : 'X7.5'},
                   {'fillStyle' : '#f26522', 'text' : 'X5'},
                   {'fillStyle' : '#000000', 'text' : 'BANKRUPT', 'textFontSize' : 12, 'textFillStyle' : '#ffffff'},
                   {'fillStyle' : '#e70697', 'text' : 'X30'},
                   {'fillStyle' : '#fff200', 'text' : 'X6'},
                   {'fillStyle' : '#f6989d', 'text' : 'X7'},
                   {'fillStyle' : '#ee1c24', 'text' : 'X3.5'},
                   {'fillStyle' : '#3cb878', 'text' : 'X5'},
                   {'fillStyle' : '#f26522', 'text' : 'X8'},
                   {'fillStyle' : '#a186be', 'text' : 'X3'},
                   {'fillStyle' : '#fff200', 'text' : 'X4'},
                   {'fillStyle' : '#00aef0', 'text' : 'X6.5'},
                   {'fillStyle' : '#ee1c24', 'text' : 'X10'},
                   {'fillStyle' : '#f6989d', 'text' : 'X5'},
                   {'fillStyle' : '#f26522', 'text' : 'X4'},
                   {'fillStyle' : '#3cb878', 'text' : 'X9'},
                   {'fillStyle' : '#000000', 'text' : 'BANKRUPT', 'textFontSize' : 12, 'textFillStyle' : '#ffffff'},
                   {'fillStyle' : '#a186be', 'text' : 'X6'},
                   {'fillStyle' : '#fff200', 'text' : 'X7'},
                   {'fillStyle' : '#00aef0', 'text' : 'X8'},
                   {'fillStyle' : '#ffffff', 'text' : 'LOOSE TURN', 'textFontSize' : 12}
                ],
                'animation' :           // Specify the animation to use.
                {
                    'type'     : 'spinToStop',
                    'duration' : 10,    // Duration in seconds.
                    'spins'    : 3,     // Default number of complete spins.
                    'callbackFinished' : alertPrize,
                    'callbackSound'    : playSound,   // Function to call when the tick sound is to be triggered.
                    'soundTrigger'     : 'pin'        // Specify pins are to trigger the sound, the other option is 'segment'.
                },
                'pins' :				// Turn pins on.
                {
                    'number'     : 24,
                    'fillStyle'  : 'silver',
                    'outerRadius': 4,
                }
            });

            // Loads the tick audio sound in to an audio object.
            let audio = new Audio('Images/tick.mp3');

            // This function is called when the sound is to be played.
            function playSound()
            {
                // Stop and rewind the sound if it already happens to be playing.
                audio.pause();
                audio.currentTime = 0;

                // Play the sound.
                audio.play();
            }

            // Vars used by the code in this page to do power controls.
            let wheelPower    = 0;
            let wheelSpinning = false;

            // -------------------------------------------------------
            // Function to handle the onClick on the power buttons.
            // -------------------------------------------------------
            function powerSelected(powerLevel)
            {
                // Ensure that power can't be changed while wheel is spinning.
                if (wheelSpinning == false) {
                    // Reset all to grey incase this is not the first time the user has selected the power.
                    document.getElementById('pw1').className = "";
                    document.getElementById('pw2').className = "";
                    document.getElementById('pw3').className = "";

                    // Now light up all cells below-and-including the one selected by changing the class.
                    if (powerLevel >= 1) {
                        document.getElementById('pw1').className = "pw1";
                    }

                    if (powerLevel >= 2) {
                        document.getElementById('pw2').className = "pw2";
                    }

                    if (powerLevel >= 3) {
                        document.getElementById('pw3').className = "pw3";
                    }

                    // Set wheelPower var used when spin button is clicked.
                    wheelPower = powerLevel;

                    // Light up the spin button by changing it's source image and adding a clickable class to it.
                    document.getElementById('spin_button').src = "Images/spin_on.png";
                    document.getElementById('spin_button').className = "clickable";
                }
            }

            // -------------------------------------------------------
            // Click handler for spin button.
            // -------------------------------------------------------
            function startSpin()
            {
                // Ensure that spinning can't be clicked again while already running.
                if (wheelSpinning == false) {
                    // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                    // to rotate with the duration of the animation the quicker the wheel spins.
                    if (wheelPower == 1) {
                        theWheel.animation.spins = 3;
                    } else if (wheelPower == 2) {
                        theWheel.animation.spins = 6;
                    } else if (wheelPower == 3) {
                        theWheel.animation.spins = 10;
                    }

                    // Disable the spin button so can't click again while wheel is spinning.
                    document.getElementById('spin_button').src       = "Images/spin_off.png";
                    document.getElementById('spin_button').className = "";

                    // Begin the spin animation by calling startAnimation on the wheel object.
                    theWheel.startAnimation();

                    // Set to true so that power can't be changed and spin button re-enabled during
                    // the current animation. The user will have to reset before spinning again.
                    wheelSpinning = true;
                }
            }

            // -------------------------------------------------------
            // Function for reset button.
            // -------------------------------------------------------
            function resetWheel()
            {
                theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
                theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
                theWheel.draw();                // Call draw to render changes to the wheel.

                document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
                document.getElementById('pw2').className = "";
                document.getElementById('pw3').className = "";

                wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
            }

            // -------------------------------------------------------
            // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
            // -------------------------------------------------------
            function alertPrize(indicatedSegment)
            {
                // Just alert to the user what happened.
                // In a real project probably want to do something more interesting than this with the result.
                if (indicatedSegment.text == 'LOOSE TURN') {
                    alert('Sorry but you loose a turn.');
                } else if (indicatedSegment.text == 'BANKRUPT') {
                    alert('Oh no, you have gone BANKRUPT!');
                } else {
                    alert("You have won " + indicatedSegment.text + "Of Your Current Stake!");
                }
            }
        </script>
        </div>

      </div>
    </div>
  </section>
  <!--//grids-->


  <!--/services-->
    <section class="w3l-features14">
    <div class="w3l-feature-6-main py-5">
      <div class="container py-lg-5">
        <div class="wrapper-max">
          <div class="header-section text-center mb-5">
            <h6 class="sub-title">We are your best bet!</h6>
            <h3 class="hny-title two">
            WHY CHOOSE US?
            </h3>
          </div>
          <div class="grid mt-lg-4">
            <div class="w3l-feature-6-gd">
              <div class="icon"><span class="fa fa-cogs"></span></div>
              <div class="w3l-feature-6-gd-info">
                <h3><a href="#url">Easy to play game</a></h3>
                <p class="pr-lg-5"> DailySpin2win spin the wheel game is the simplest and most straightforward game to play.
                </p>
              </div>
            </div>
            <div class="w3l-feature-6-gd">
              <div class="icon"><span class="fa fa-home"></span></div>
              <div class="w3l-feature-6-gd-info">
                <h3><a href="#url">Welcome Bonus</a></h3>
                <p class="pr-lg-5">New players receive bonus to spin and win real cash. Enjoy weekly promotional bonuses for active players.</p>
              </div>
            </div>
            <div class="w3l-feature-6-gd">
              <div class="icon"><span class="fa fa-money"></span></div>
              <div class="w3l-feature-6-gd-info">
                <h3><a href="#url">Unlock New Levels</a></h3>
                <p class="pr-lg-5">New levels guarantee great bonuses for more free spins. Get rewarded real cash for every new level.</p>
              </div>
            </div>
            <div class="w3l-feature-6-gd">
              <div class="icon"><span class="fa fa-pie-chart"></span></div>
              <div class="w3l-feature-6-gd-info">
                <h3><a href="#url">100% Secure</a></h3>
                <p class="pr-lg-5">We are licensed and regulated by an independent governing body. They ensue we give our clients a fair game.</p>
              </div>
            </div>
            
          </div>

        </div>

        <a href="<?= baseURL('our-services/'); ?>" class="btn btn-style mt-lg-4 mt-2">Read More</a>

      </div>
    </div>
  </section>
  <!--//services-->

    <!--/get -->
    <section class="w3l-grid-quote text-center py-5">
    <div class="container py-3">
      <h6 class="sub-title text-center">Spin Now And Get Paid Instantly!</h6>
      <h3 class="hny-title mb-md-5 mb-4">GET PAYOUTS IN THE MOST CONVENIENT WAY</h3>
      <img src="/Images/paymentmethod1.png" class="img-fluid" alt="Payment"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="/Images/paymentmethod2.png" class="img-fluid" alt="Payment"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="/Images/paymentmethod7.png" class="img-fluid" alt="Payment"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!-- <img src="/Images/paymentmethod6.png" class="img-fluid" alt="Payment"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --> <img src="/Images/paymentmethod5.png" class="img-fluid" alt="Payment"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="/Images/paymentmethod4.png" class="img-fluid" alt="Payment"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="/Images/paymentmethod3.png" class="img-fluid" alt="Payment"> 
      <hr>
      <a href="<?= baseURL('register/')?>" class="btn btn-style btn-primary mr-2">Start Here</a>
      <a href="<?= baseURL('login/')?>" class="btn btn-style btn-outline-primary">Login Now</a>
    </div>
  </section>
  <!--//get -->

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
                    They offer an all-around reliable experience and lightning fast payouts. <?= getenv('APP_NAME')?> has developed a reputation for offering top service.
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
                    I loved the many bonuses and the free spins that are available.. Thumbs up guys!
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
                    The referral program really works for me. I always have extra bonus to spin for real cash.
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


<?php 

include 'layout/footer.php'; 

?>