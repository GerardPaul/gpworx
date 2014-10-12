<?php
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/gpworx';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>GP Worx | Error 404</title>
        <meta name="description" content="This site is a project of Gerard Paul Picardal Labitad.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo $base_url . "/application/mysite/assets/img/favicon.ico"; ?>" type="image/x-icon"/>

        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo $base_url . "/assets/css/bootstrap.min.css"; ?>">
        <link rel="stylesheet" href="<?php echo $base_url . "/assets/css/bootstrap-theme.min.css"; ?>">

        <!-- My CSS -->
        <link rel="stylesheet" href="<?php echo $base_url . "/application/mysite/assets/css/error_custom.css"; ?>">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    </head>
    <style type="text/css">

        ::selection{ background-color: #E13300; color: white; }
        ::moz-selection{ background-color: #E13300; color: white; }
        ::webkit-selection{ background-color: #E13300; color: white; }

        body {
            background-color: #fff;
            color: #FFF;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        #container h2 {
            color: #fff;
            background-color: #269ABC;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: bold;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            -webkit-box-shadow: 0 0 8px #D0D0D0;
        }

        p {
            margin: 12px 15px 12px 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>GP Worx</h1>
        </div>
        <div class="row">
            <div id="container">
                <h2><?php echo $heading; ?></h2>
                <?php echo $message; ?>
                <p>
                    <a href="<?php echo $base_url; ?>" class="btn btn-primary btn-sm">
                        Back to Home
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div id="footer">
        <div class="container">
            <p class="navbar-text">Copyright &copy; 
                <script>
                    document.write(new Date().getFullYear());
                </script>
                <a href="http://gpplworx.com" target="_blank">Gerard Paul P. Labitad</a>
            </p>
        </div>
    </div>
</body>
</html>