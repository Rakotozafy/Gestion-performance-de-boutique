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
        <h2 style="margin-top:0px">Reg_radio Read</h2>
        <table class="table">
	    <tr><td>RgRd Date</td><td><?php echo $rgRd_date; ?></td></tr>
	    <tr><td>RgRd NomPatient</td><td><?php echo $rgRd_nomPatient; ?></td></tr>
	    <tr><td>RgRd NumQuittance</td><td><?php echo $rgRd_numQuittance; ?></td></tr>
	    <tr><td>RgRd Status</td><td><?php echo $rgRd_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('reg_radio') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>