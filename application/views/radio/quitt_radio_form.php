
    <div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Formulaire de quittance radio</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
        
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Rd Denomination <?php echo form_error('rd_denomination') ?></label>
            <input type="text" class="form-control" name="rd_denomination" id="rd_denomination" placeholder="Rd Denomination" value="<?php echo $rd_denomination; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Rd Somme <?php echo form_error('rd_somme') ?></label>
            <input type="number" class="form-control" name="rd_somme" id="rd_somme" placeholder="Rd Somme" value="<?php echo $rd_somme; ?>" />
        </div>
	     <div class="form-group">
                        <label>Nom du patient <?php echo form_error('pat_id') ?></label>
                        <select name="pat_id" id="pat_id" class="form-control">
                            <?php foreach ($patients as $patient) {
                                echo "<option value='" . $patient->pat_id . "'>" . $patient->pat_nom . "</option>";
                            } ?>
                        </select>
                    </div>
	    <input type="hidden" name="rd_id" value="<?php echo $rd_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('radio') ?>" class="btn btn-default">Cancel</a>
	</form>
            </div>

        </div>
    </div>
</div>