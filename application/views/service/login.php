<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets1/img/logo-dark.png') ?>" />
    <title>CHU - Gestion de quittance</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets1/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets1/css/font-awesome.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets1/css/style.css') ?>" />
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="<?php echo site_url("Service/identification") ?>" class="form-signin" method="POST">
                        <div class="account-logo">
                            <a href="<?php echo site_url('Service') ?>"><img src="<?php echo base_url('assets1/img/logo-dark.png"') ?>" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" autofocus="" name="loginU" id="identifiant" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="passwdU" id="mdp" required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets1/js/jquery-3.2.1.min.js') ?>" />
    <script src="<?php echo base_url('assets1/js/popper.min.js') ?>" />
    <script src="<?php echo base_url('assets1/js/bootstrap.min.js') ?>" />
    <script src="<?php echo base_url('assets1/js/app.js') ?>" />
</body>

</html>