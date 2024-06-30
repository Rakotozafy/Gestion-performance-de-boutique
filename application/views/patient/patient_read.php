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
        <h2 style="margin-top:0px">Patient Read</h2>
        <table class="table">
	    <tr><td>Pat Nom</td><td><?php echo $pat_nom; ?></td></tr>
	    <tr><td>Pat Prenom</td><td><?php echo $pat_prenom; ?></td></tr>
	    <tr><td>Pat DateNaissance</td><td><?php echo $pat_dateNaissance; ?></td></tr>
	    <tr><td>Pat Sexe</td><td><?php echo $pat_sexe; ?></td></tr>
	    <tr><td>Pat Type</td><td><?php echo $pat_type; ?></td></tr>
	    <tr><td>Pat Commune</td><td><?php echo $pat_commune; ?></td></tr>
	    <tr><td>Pat Addresse</td><td><?php echo $pat_addresse; ?></td></tr>
	    <tr><td>Pat Profession</td><td><?php echo $pat_profession; ?></td></tr>
	    <tr><td>Tp Id</td><td><?php echo $tp_id; ?></td></tr>
	    <tr><td>Pat Status</td><td><?php echo $pat_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('patient') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>