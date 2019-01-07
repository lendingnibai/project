<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?php echo base_url()?>public/img/logo/logosm.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url()?>public/css/admin_mdb.min.css" rel="stylesheet">

    <link href="<?php echo base_url()?>public/css/addons/datatables.min.css" rel="stylesheet">

    <style type="text/css">
    /*body.modal-open {
        overflow: hidden;
    }
*/      @media (min-width: 800px) and (max-width: 850px) {
          .navbar:not(.top-nav-collapse) {
              background: #1C2331!important;
          }
      }
    </style>
    
</head>
<body class="grey lighten-5">
<div class='thetop'></div>
<input type="hidden" name="base_url" id="base_url" value="<?php echo strtolower(base_url());?>">
