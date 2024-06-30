<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Formulaire de quittance d'analyse</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
              
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">  Desciption <?php echo form_error('bds_desciption') ?></label>
            <input type="text" class="form-control" name="bds_desciption" id="bds_desciption" placeholder="  Desciption" value="<?php echo $bds_desciption; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">  Somme <?php echo form_error('bds_somme') ?></label>
            <input type="number" class="form-control" name="bds_somme" id="bds_somme" placeholder="  Somme" value="<?php echo $bds_somme; ?>" />
        </div>
        <div class="form-group">
                        <label>Nom du patient <?php echo form_error('pat_id') ?></label>
                        <select name="pat_id" id="pat_id" class="form-control">
                            <?php foreach ($patients as $patient) {
                                echo "<option value='" . $patient->pat_id . "'>" . $patient->pat_nom . "</option>";
                            } ?>
                        </select>
                    </div>
	    <input type="hidden" name="bds_id" value="<?php echo $bds_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('banquedesang') ?>" class="btn btn-default">Cancel</a>
	</form>
                </div>
            </div>

        </div>
    </div>
</div>

