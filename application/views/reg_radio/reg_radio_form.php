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
        <h2 style="margin-top:0px">Reg_radio <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">RgRd Date <?php echo form_error('rgRd_date') ?></label>
            <input type="text" class="form-control" name="rgRd_date" id="rgRd_date" placeholder="RgRd Date" value="<?php echo $rgRd_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">RgRd NomPatient <?php echo form_error('rgRd_nomPatient') ?></label>
            <input type="text" class="form-control" name="rgRd_nomPatient" id="rgRd_nomPatient" placeholder="RgRd NomPatient" value="<?php echo $rgRd_nomPatient; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">RgRd NumQuittance <?php echo form_error('rgRd_numQuittance') ?></label>
            <input type="text" class="form-control" name="rgRd_numQuittance" id="rgRd_numQuittance" placeholder="RgRd NumQuittance" value="<?php echo $rgRd_numQuittance; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">RgRd Status <?php echo form_error('rgRd_status') ?></label>
            <input type="text" class="form-control" name="rgRd_status" id="rgRd_status" placeholder="RgRd Status" value="<?php echo $rgRd_status; ?>" />
        </div>
	    <input type="hidden" name="rgRd_id" value="<?php echo $rgRd_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('reg_radio') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>