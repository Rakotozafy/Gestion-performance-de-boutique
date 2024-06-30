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
        <h2 style="margin-top:0px">Quitt_radio Read</h2>
        <table class="table">
	    <tr><td>Rd Denomination</td><td><?php echo $rd_denomination; ?></td></tr>
	    <tr><td>Rd Somme</td><td><?php echo $rd_somme; ?></td></tr>
	    <tr><td>Pat Id</td><td><?php echo $pat_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('radio') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>