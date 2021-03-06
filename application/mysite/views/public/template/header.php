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
		<meta name="p:domain_verify" content="e2e59a0fade40ccdc28803039f2a34d6"/>
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
        <link rel="stylesheet" href="<?php echo base_url("application/mysite/assets/css/carousel.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("application/mysite/assets/css/cover.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("application/mysite/assets/css/custom.css"); ?>">

        <!-- Fonts -->
        <link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>-->

        <!-- Bootstrap and JQuery -->
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.1.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

    </head>
    <body>
        <!-- header -->
        <div class="navbar-wrapper">
            <div class="container">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="navbar-header">
                            <button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="#" title="GP Worx" id="logo" class="logo">
                                <img class="img-responsive brand_logo" src="<?php echo base_url(); ?>application/mysite/assets/img/gerardpaullabitad-gpworx-logo_white.png" alt="GP Worx" title="GP Worx">
                            </a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav pull-right">
                                <li class="<?php if (isset($active['home'])){ echo $active['home']; } ?>"><a href="#">Home</a></li>
                                <li class="<?php if (isset($active['portfolio'])){ echo $active['portfolio']; } ?>"><a href="#">Portfolio</a></li>
                                <li class="<?php if (isset($active['about'])){ echo $active['about']; } ?>"><a href="#">About</a></li>
                                <li class="<?php if (isset($active['contact'])){ echo $active['contact']; } ?>"><a href="#">Contact</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>