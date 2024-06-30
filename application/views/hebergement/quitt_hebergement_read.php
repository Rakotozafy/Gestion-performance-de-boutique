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
        <h2 style="margin-top:0px">Quitt_hebergement Read</h2>
        <table class="table">
	    <tr><td>Hb Numero</td><td><?php echo $hb_numero; ?></td></tr>
	    <tr><td>Hb Service</td><td><?php echo $hb_service; ?></td></tr>
	    <tr><td>Hb DateEntre</td><td><?php echo $hb_dateEntre; ?></td></tr>
	    <tr><td>Hb DateSortie</td><td><?php echo $hb_dateSortie; ?></td></tr>
	    <tr><td>Hb Categorie</td><td><?php echo $hb_categorie; ?></td></tr>
	    <tr><td>Hb Prix</td><td><?php echo $hb_prix; ?></td></tr>
	    <tr><td>Hb Somme</td><td><?php echo $hb_somme; ?></td></tr>
	    <tr><td>Pat Id</td><td><?php echo $pat_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('hebergement') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>