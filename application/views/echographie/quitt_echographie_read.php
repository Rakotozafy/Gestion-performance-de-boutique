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
        <h2 style="margin-top:0px">Quitt_echographie Read</h2>
        <table class="table">
	    <tr><td>Echo Designation</td><td><?php echo $echo_designation; ?></td></tr>
	    <tr><td>Echo Somme</td><td><?php echo $echo_somme; ?></td></tr>
	    <tr><td>Pat Id</td><td><?php echo $pat_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('echographie') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>