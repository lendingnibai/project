<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$link = str_replace('index.php/', '', $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="http://localhost/mangjuam.com/public/img/logo/logosm.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>404 Page Not Found</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="http://localhost/mangjuam.com/public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="http://localhost/mangjuam.com/public/css/mdb.min.css" rel="stylesheet">

    <link href="http://localhost/mangjuam.com/public/css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="http://localhost/mangjuam.com/public/css/custom/style.min.css" rel="stylesheet">
</head>

<style>

    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 815px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 600px;
      }
    }

    .intro-2 {
        background: url("http://localhost/mangjuam.com/public/img/logo/logow.png")no-repeat center center;
        background-size: cover;
    }
</style>

<body class="creative-lp">

    <!-- Navigation & Intro -->
    <header>

        <!--Intro Section-->
        <section class="view intro-2">
            <div class="mask rgba-teal-strong">
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="row">
                        <div class="col-md-12 wow fadeIn mb-3">
                            <div class="card card-body rgba-cyan-slight text-center white-text">
                                <ul class="list-unstyled py-5 mx-lg-5">
                                    <li>
                                        <h1 class="display-1 mt-5 mx-5 mt-lg-0 mb-5 font-weight-bold white-text wow fadeIn" data-wow-delay="0.3s">
                                            <strong>Error 404</strong>
                                        </h1>
                                    </li>
                                    <li>
                                    	<h4 class="red lighten-1 p-1 rounded white-text"><?php echo $link?></h4>

                                        <h4 class="white-text description mb-4 wow fadeIn" data-wow-delay="0.4s">Opps! Page Not Found
                                        </h4>

                                        <h6 class="white-text description pb-3 wow fadeIn" data-wow-delay="0.4s"> The page you're looking for is not found, Please try later or back to
                                            <a href="http://localhost/mangjuam.com/"
                                                class="font-weight-bold indigo-text">Home</a>.
                                        </h6>

                                        
                                        <!--Linkedin-->
                                        <a href="http://localhost/mangjuam.com/" class="p-2 m-2 fa-lg li-ic">
                                            <i class="fa fa-home white-text"> </i>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </header>
    <!-- Navigation & Intro -->
</body>
</html>