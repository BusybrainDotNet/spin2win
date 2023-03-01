<?php

session_start();
 if (isset($_SESSION['uniqueid'])) {

    if ($_SESSION['log_session'] != $adminInfo['log_session']) {
        echo '<meta http-equiv="refresh" content="1; URL=../../login/">';

    }elseif (empty($adminInfo['uniqueid'])) {
    echo '<meta http-equiv="refresh" content="1; URL=../../login/">';

    }
 }

 
include 'location.php';
include 'timeAgo.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="At <?= getenv('APP_NAME'); ?>, We Offer The Most Professional Construction Engineering, Buying & Selling of Real Estate & Properties." />
  <meta name="keywords" content="Real Estate, Building Construction, Architectural Designs, Construction Engineering, Buy Home, Sell Home" />
  <meta name="author" content="ITM-Network" />

 <!-- Favicons -->
  <link href="/Images/favicon.png" rel="icon">
  <link href="/Images/favicon.png" rel="apple-touch-icon">


  <!-- Bootstrap core CSS -->
  <link href="<?= public_asset('/other_assets/admin/lib/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!--external css-->
  <link href="<?= public_asset('/other_assets/admin/lib/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?= public_asset('/other_assets/admin/css/zabuto_calendar.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= public_asset('/other_assets/admin/lib/gritter/css/jquery.gritter.css') ?>" />
  <!-- Custom styles for this template -->
  <link type="text/css" href="<?= public_asset('/other_assets/admin/css/style.css'); ?>" rel="stylesheet">
  <link type="text/css" href="<?= public_asset('/other_assets/admin/css/style-responsive.css'); ?>" rel="stylesheet">
  <script src="<?= public_asset('/other_assets/admin/lib/chart-master/Chart.js'); ?>"></script>


  
</head>

<body>