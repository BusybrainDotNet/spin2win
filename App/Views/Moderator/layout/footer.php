
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
         <p>
           <strong>&copy; Copyright <span> <script type="text/JavaScript">
          document.write(new Date().getFullYear());
          </script> <?= trim(getenv('APP_NAME'));?></span>. All Rights Reserved </strong> </span>
        </p>
        <div class="credits">
         Powered By <a href="<?= getenv('DV_LINK')?>" target="_blank"><?= getenv('DV_NAME')?></a>
        </div>
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->


  <script src="<?= public_asset('/other_assets/admin/lib/jquery/jquery.min.js'); ?>"></script>

  <script src="<?= public_asset('/other_assets/admin/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script class="include" type="text/javascript" src="<?= public_asset('/other_assets/admin/lib/jquery.dcjqaccordion.2.7.js'); ?>"></script>
  <script src="<?= public_asset('/other_assets/admin/lib/jquery.scrollTo.min.js'); ?>"></script>
  <script src="<?= public_asset('/other_assets/admin/lib/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
  <script src="<?= public_asset('/other_assets/admin/lib/jquery.sparkline.js'); ?>"></script>
  <!--common script for all pages-->
  <script src="<?= public_asset('/other_assets/admin/lib/common-scripts.js'); ?>"></script>
  <script type="text/javascript" src="<?= public_asset('/other_assets/admin/lib/gritter/js/jquery.gritter.js'); ?>"></script>
  <script type="text/javascript" src="<?= public_asset('/other_assets/admin/lib/gritter-conf.js'); ?>"></script>
  <!--script for this page-->
  <script src="<?= public_asset('/other_assets/admin/lib/sparkline-chart.js'); ?>"></script>
  <script src="<?= public_asset('/other_assets/admin/lib/zabuto_calendar.js'); ?>"></script>

<script>
  // Get the modal
  var modal = document.getElementById("1");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>


  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome <?= $adminInfo['username']; ?>',
        // (string | mandatory) the text inside the notification
        text: 'This Software Is Developed By Information Technology & Media Network. <br>Feel Free To <a href="https://itm-network.com/write-us/" target="_blank">Raise a Ticket</a> If Need Be.',
        // (string | optional) the image to display on the left
        image: '/Images/developer.png',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
