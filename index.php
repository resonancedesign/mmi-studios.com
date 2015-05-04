<?php 
    session_start();
    error_reporting(0);
    require_once('app/config.php');
    if(isset($_GET['page'])) {
        $pages = array('updates', 'artists', 'products', 'services', 'cart', 'charge', 'events', 'media', 'community', 'classifieds', 'about', 'docs', 'faq', 'blog', 'forum');
        if(in_array($_GET['page'], $pages)) {
            $page = $_GET['page'];
        } else {
            $page = 'products';
        }
    } else {
        $page = 'updates';
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html lang="en">
    <head>
        <title>MMI Studios</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MMI Studios is a multimedia collective, a creative community, a net-label, and a staffing solution... Software, sample archives, tutorials, design assets, etc...">
        <meta name="keywords" content="">
        <meta name="author" content="Richard Bakos">
        <meta name="generator" content="ResDes CMS V1" />

        <!--[if IE]><link rel="shortcut icon" href="favicon.ico"><![endif]-->
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
        <link rel="icon" href="favicon.png">

        <link href="css/mmi-studios.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- //TODO: (theme) +1 | Build a full theme system to easily swap out designs -->
        <div id="index">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="col-lg-12">
                        <!-- header start -->
                        <?php include_once('app/includes/layout/header.php'); ?>
                        <!-- header stop -->
                    </div>
                </div>
            </div>

            <!-- main content start -->
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="col-md-12">
                        <!-- //TODO: (dynamics) +1 | Figure out how to swap out heading based on content that is being loaded via AJAX -->
                        <div class="col-sm-12 main-heading">
                            <h1>Latest posts from the collective...</h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-sm-12 content-area lr-borders">
                            <!-- column left -->
                            <?php include_once('app/includes/layout/main.php'); ?>
                            <!-- column right -->
                            <?php include_once('app/includes/layout/sidebar.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main content stop -->

            <!-- footer start -->
            <?php include_once('app/includes/layout/footer.php'); ?>
            <!-- footer stop -->
        </div>
        
        <!-- Load libraries -->
        <?php include_once('app/includes/content/data/javascripts.php'); ?> 
    </body>
</html>