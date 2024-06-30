<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Utilisateur Read</h2>
        <table class="table">
	    <tr><td>Util Nom</td><td><?php echo $util_nom; ?></td></tr>
	    <tr><td>Util Prenom</td><td><?php echo $util_prenom; ?></td></tr>
	    <tr><td>Util Mail</td><td><?php echo $util_mail; ?></td></tr>
	    <tr><td>Util Login</td><td><?php echo $util_login; ?></td></tr>
	    <tr><td>Util Mdp</td><td><?php echo $util_mdp; ?></td></tr>
	    <tr><td>Util Photo</td><td><?php echo $util_photo; ?></td></tr>
	    <tr><td>Type</td><td><?php echo $type; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('utilisateur') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>