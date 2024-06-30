<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Formulaire de quittance de certificat medical</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Designation <?php echo form_error('cm_designation') ?></label>
                        <input type="text" class="form-control" name="cm_designation" id="cm_designation" value="<?php echo $cm_designation; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Montant <?php echo form_error('cm_somme') ?></label>
                        <input type="text" class="form-control" name="cm_somme" id="cm_somme" placeholder="en ariary" value="<?php echo $cm_somme; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nom du patient <?php echo form_error('pat_id') ?></label>
                        <select name="pat_id" id="pat_id" class="form-control">
                            <?php foreach ($patients as $patient) {
                                echo "<option value='" . $patient->pat_id . "'>" . $patient->pat_nom . "</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="int">Nom du docteur <?php echo form_error('doc_im') ?></label>
                        <select name="doc_im" id="doc_im" class="form-control">
                            <?php foreach ($docteurs as $docteur) {
                                echo "<option value='" . $docteur->doc_im . "'>" . $docteur->doc_nom . "</option>";
                            } ?>
                        </select>
                    </div>
                    <input type="hidden" name="cm_id" value="<?php echo $cm_id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('certificatmedical') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>

        </div>
    </div>
</div>