<?php include 'top.php';?>

<title>Dynamic Route | Byte_Code MVC </title>

<body>
       <!--main content start-->
    <section id="container">
      <div class="row">
        <!-- /col-lg-12 -->
        <div class="col-lg-12">  
            <img class="logo" src="<?= public_asset('/framework_assets/img/favicon.png') ?>" alt="Logo">
           <h1 class="header centered"> Byte_Code MVC </h1>
           <h5 class="centered">Dynamic Route Page:- <?= $dynamo ?></h5>
           <h6 class="centered"> Return Home:- <a href="<?= baseURL() ?>" target="_blank"> << Go Back </a>
            </h6>
            <br><hr><br>
            <div class="centered">
            <a href="https://github.com/BusyBrainDotNet/Byte_Code" target="_blank"> Github >>
                    </a>
            <a href="https://linkedin.com/ln" target="_blank"> LinkedIn >>
                    </a>
            
            </div>
          </div>
        </div>
    </section>
    <script src="<?= public_asset('/framework_assets/js/script.js') ?>"></script>
</body>
</html>