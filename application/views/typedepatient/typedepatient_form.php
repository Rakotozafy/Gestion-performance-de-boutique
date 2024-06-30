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
        <h2 style="margin-top:0px">Typedepatient <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Tp TypeDePatient <?php echo form_error('tp_typeDePatient') ?></label>
            <input type="text" class="form-control" name="tp_typeDePatient" id="tp_typeDePatient" placeholder="Tp TypeDePatient" value="<?php echo $tp_typeDePatient; ?>" />
        </div>
	    <input type="hidden" name="tp_id" value="<?php echo $tp_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('typedepatient') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>