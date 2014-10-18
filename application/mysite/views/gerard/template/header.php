<?php
$current_controller = $this->router->fetch_class();
$active[$current_controller] = 'active';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>GP Worx | <?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url("application/mysite/assets/img/favicon.ico"); ?>" type="image/x-icon"/>

        <!-- Application CSS -->
        <link rel="stylesheet" href="<?php echo base_url("application/mysite/assets/css/bootstrapValidator.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("application/mysite/assets/css/jquery.dataTables.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("application/mysite/assets/css/datepicker.css"); ?>">

        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>">

        <!-- My CSS -->
<!--        <link rel="stylesheet" href="<?php echo base_url("application/mysite/assets/css/carousel.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("application/mysite/assets/css/cover.css"); ?>">-->
        <link rel="stylesheet" href="<?php echo base_url("application/mysite/assets/css/gerard_custom.css"); ?>">

        <!-- Fonts -->
        <link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>-->

        <!-- Bootstrap and JQuery -->
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.1.min.js"); ?>"></script>
        <!--<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-ui.min.js"); ?>"></script>-->
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

    </head>
    <body>
        <!-- header -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="" title="GP Worx" id="logo" class="navbar-brand">
                        <img class="img-responsive brand_logo" src="<?php echo base_url(); ?>application/mysite/assets/img/gerardpaullabitad-gpworx-logo_white.png" alt="GP Worx" title="GP Worx">
                        <span>GP Worx</span>
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url(); ?>" target="_blank"><i class="fa fa-external-link"></i>&nbsp;Preview</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="<?php if (isset($active['home'])){ echo $active['home']; } ?>"><a href="<?php echo base_url(); ?>gerard/home"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                        <li class="<?php if (isset($active['admin'])){ echo $active['admin']; } ?>"><a href="<?php echo base_url(); ?>gerard/admin"><i class="fa fa-user-md"></i><span>Manage Admin</span></a></li>
                        <li class="<?php if (isset($active['background'])){ echo $active['background']; } ?>"><a href="<?php echo base_url(); ?>gerard/background"><i class="fa fa-image"></i><span>Manage Backgrounds</span></a></li>
                        <li class="<?php if (isset($active['portfolio'])){ echo $active['portfolio']; } ?>"><a href="<?php echo base_url(); ?>gerard/portfolio"><i class="fa fa-file-text"></i><span>Manage Portfolio</span></a></li>
                        <li class="<?php if (isset($active['about'])){ echo $active['about']; } ?>"><a href="<?php echo base_url(); ?>gerard/about"><i class="fa fa-book"></i><span>Manage About</span></a></li>
                        <li><a href="<?php echo base_url(); ?>gerard/home/logout"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                