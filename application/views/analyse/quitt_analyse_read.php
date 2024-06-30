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
        <h2 style="margin-top:0px">Quitt_analyse Read</h2>
        <table class="table">
	    <tr><td>Al Description</td><td><?php echo $al_description; ?></td></tr>
	    <tr><td>Al Somme</td><td><?php echo $al_somme; ?></td></tr>
	    <tr><td>AlG Id</td><td><?php echo $alG_id; ?></td></tr>
	    <tr><td>Pat Id</td><td><?php echo $pat_id; ?></td></tr>
	    <tr><td>AlG Status</td><td><?php echo $alG_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('analyse') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>