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
        <h2 style="margin-top:0px">Analysegamme <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">AlG Nom <?php echo form_error('alG_nom') ?></label>
            <input type="text" class="form-control" name="alG_nom" id="alG_nom" placeholder="AlG Nom" value="<?php echo $alG_nom; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">AlG Description <?php echo form_error('alG_description') ?></label>
            <input type="text" class="form-control" name="alG_description" id="alG_description" placeholder="AlG Description" value="<?php echo $alG_description; ?>" />
        </div>
	    <input type="hidden" name="alG_id" value="<?php echo $alG_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('analysegamme') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>