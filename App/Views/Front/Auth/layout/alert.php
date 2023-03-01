<!-- Function Alerts For User  -->

<?php if (!empty($message)) { ?>

   
    <?php if ($data['type'] == "error" ) { ?>
            
         <p style="font-size: 16px; font-weight: bold; color: red; margin-top: 20px; margin-top: 20px; margin-bottom: 20px; margin-bottom: 20px;"> <?php echo $data["message"]; ?> </p>

    <?php } else { ?>

         <p style="font-size: 16px; font-weight: bold; color: green; margin-top: 20px; margin-top: 20px; margin-bottom: 20px; margin-bottom: 20px;"> <?php echo $data["message"]; ?> </p>

    <?php } ?>
    
<?php } ?>

<!-- End Fuction Alerts For User  -->


