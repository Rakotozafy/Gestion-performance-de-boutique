<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Formulaire de quittance d'echographie</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Echo Designation <?php echo form_error(
                'echo_designation'
            ); ?></label>
            <input type="text" class="form-control" name="echo_designation" id="echo_designation" placeholder="Echo Designation" value="<?php echo $echo_designation; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Echo Somme <?php echo form_error(
                'echo_somme'
            ); ?></label>
            <input type="number" class="form-control" name="echo_somme" id="echo_somme" placeholder="Echo Somme" value="<?php echo $echo_somme; ?>" />
        </div>
	   <div class="form-group">
                        <label>Nom du patient <?php echo form_error(
                            'pat_id'
                        ); ?></label>
                        <select name="pat_id" id="pat_id" class="form-control">
                            <?php foreach ($patients as $patient) {
                                echo "<option value='" .
                                    $patient->pat_id .
                                    "'>" .
                                    $patient->pat_nom .
                                    '</option>';
                            } ?>
                        </select>
                    </div>
	    <input type="hidden" name="echo_id" value="<?php echo $echo_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button; ?></button> 
	    <a href="<?php echo site_url(
         'echographie'
     ); ?>" class="btn btn-default">Cancel</a>
	</form>
            </div>

        </div>
    </div>
</div>