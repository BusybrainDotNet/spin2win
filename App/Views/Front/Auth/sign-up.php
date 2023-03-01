<?php 

include 'layout/top.php'; 
include 'layout/navbar.php';  

?>

<title>Become a Member | Register | <?= getenv('APP_NAME'); ?></title>


<!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-center">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">Member Area</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="<?= baseURL('index/'); ?>">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Register </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- //about breadcrumb -->
   <!--/contact-->
   <section class="w3l-contact-11 py-5">
    <div class="contacts-main py-lg-5 py-md-4">
      <div class="title-content text-center">
        <h6 class="sub-titlehny">Fill The Form Fields Below To Register</h6>
        <h3 class="hny-title">Become a Member</h3>
    </div>
      <div class="form-41-mian section-gap mt-5">
        <div class="container">


            <?php include 'layout/alert.php'; ?>


          <div class="d-grid align-form-map">
            <div class="form-inner-cont">

              <form action="<?= baseURL('join-us/'); ?>" method="POST" class="signin-form">
                
                <input type="hidden" name="ip" value="<?php echo $ip?>">
                <input type="hidden" name="ua" value="<?php echo $user_agent?>">

                <div class="form-input">
                  <label for="w3lName">First Name</label>
                  <input type="text" name="f" id="w3lName" placeholder="First Name" maxlength="30" required/>
                </div>

                <div class="form-input">
                  <label for="w3lName">Last Name</label>
                  <input type="text" name="l" id="w3lName" placeholder="Last Name" maxlength="30" required/>
                </div>

                <div class="form-input">
                  <label for="w3lName">Email ID</label>
                  <input type="text" name="e" id="w3lName" placeholder="Email ID" maxlength="50" required/>
                </div>

                <div class="form-input">
                  <label for="w3lSender">Password (Required)*</label>
                  <input type="password" name="p" id="w3lSender" placeholder="************" required />
                </div>

                <div class="form-submit text-left mt-3 mb-5">
                    <button type="submit" class="btn btn-style btn-primary" name="join">Continue</button>
                </div>

              </form>

              <p class="text-3 text-left text-muted">Already have an account? <a class="btn-link" href="<?= baseURL('member-area/'); ?>">Login </a></p>

            </div>
            <div class="map">
              <center> <img src="/Images/other2.jpeg" alt="Logo" style="max-width: 600px"> </center>
            </div>
          </div>
        </div>
      </div>
      <div class="contant11-top-bg mt-lg-5 mt-4">
        <div class="container">
          <div class="d-grid contact pt-lg-4">
            <div class="contact-info-left d-grid text-left">
             <!-- <div class="contact-info mt-4">
                <h4>London Office</h4>
                <p class="mb-3"><label>Address: </label> London, LY-90814 Hill Station 2nd Street</p>
                <p class="mb-3"><label>Email : </label> <a href="mailto:homish@email.com" class="email">homish@email.com</a></p>
                <p class="mb-3"><label>Phone : </label> <a href="tel:+1-2345-678-11">+1-2345-678-11</a></p>
                 <p class="mb-3"><label>Hours : </label> Mon-Fri: 8am – 7pm</p>
              </div>
              <div class="contact-info mt-4">
                <h4>Newyork Office</h4>
                <p class="mb-3"><label>Address: </label> Newyork, NY-90814 Hill Station 3rd Street</p>
                <p class="mb-3"><label>Email : </label> <a href="mailto:homish@email.com" class="email">homish@email.com</a></p>
                <p class="mb-3"><label>Phone : </label> <a href="tel:+1-2345-678-11">+1-2345-678-11</a></p>
                 <p class="mb-3"><label>Hours : </label> Mon-Fri: 8am – 7pm</p>
              </div>
              <div class="contact-info mt-4">
                <h4>Berlin Office</h4>
                <p class="mb-3"><label>Address: </label> Berlin, BY-90814 Hill Station 4th Street</p>
                <p class="mb-3"><label>Email : </label> <a href="mailto:homish@email.com" class="email">homish@email.com</a></p>
                <p class="mb-3"><label>Phone : </label> <a href="tel:+1-2345-678-11">+1-2345-678-11</a></p>
                 <p class="mb-3"><label>Hours : </label> Mon-Fri: 8am – 7pm</p>
              </div> -->
            </div>
          </div>
        </div>
      </div>
  </section>
  <!--//contact-->


<?php include 'layout/footer.php';  ?>