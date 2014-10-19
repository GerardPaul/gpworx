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

        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>">

        <!-- My CSS -->
        <link rel="stylesheet" href="<?php echo base_url("application/mysite/assets/css/login_custom.css"); ?>">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div class="container">
            <div class="login-header">
                <img class="img-circle" src="<?php echo base_url("application/mysite/assets/img/gerardpaullabitad-gpworx-logo.jpg"); ?>" height="100px">
                <h1>GP Worx</h1>
            </div>
            <div class="login-box">
                <div class="well">
                    <div class="login-user">
                        <?php if($profile->getProfile1() === NULL){ ?>
                            <img src="<?php echo base_url("application/mysite/assets/img/gerardpaullabitad_gpworx_gpplworx-user.jpg"); ?>" height="150px" class="img-circle" alt="GP Worx | GPPL Worx">
                        <?php } else{ ?>
                            <img height="150px" class="img-circle" src="<?php echo $profile->getProfile1(); ?>" alt="GP Worx | GPPL Worx">
                        <?php }?>
                    </div>
                    <form class="form-signin" role="form" action="<?php echo base_url("login/auth"); ?>" method="post">

                        <?php
                        if (isset($message)) {
                            echo <<<HTML
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button class="close" type="button" data-dismiss="alert">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						{$message}
					</div>
HTML;
                        }
                        ?>
                        <input class="form-control" type="text" autofocus="" required="" placeholder="Username" name="username">
                        <input class="form-control" type="password" autofocus="" required="" placeholder="Password" name="password">
                        <button class="btn btn-primary btn-block btn-lg" type="submit">Sign In</button>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.1.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
        
    </body>
</html>