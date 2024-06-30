<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Formulaire de quittance de consultation</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Numero <?php echo form_error('cons_numero') ?></label>
                        <input type="text" class="form-control" name="cons_numero" id="cons_numero" value="<?php echo $cons_numero; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Date de Consultation <?php echo form_error('cons_dateConsultation') ?></label>
                        <input type="date" class="form-control" name="cons_dateConsultation" id="cons_dateConsultation" value="<?php echo $cons_dateConsultation; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Montant<?php echo form_error('cons_cout') ?></label>
                        <input type="text" class="form-control" name="cons_cout" id="cons_cout" value="<?php echo $cons_cout; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Validation<?php echo form_error('con_validation') ?></label>
                        <input type="text" class="form-control" name="con_validation" id="con_validation" value="<?php echo $con_validation; ?>" />
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
                        <label for="int">Nom du docteur-Service <?php echo form_error('doc_im') ?></label>
                        <select name="doc_im" id="doc_im" class="form-control">
                            <?php foreach ($docteurs as $docteur) {
                                echo "<option value='" . $docteur->doc_im . "'>" . $docteur->doc_nom . "-" . $docteur->doc_service . "</option>";
                            } ?>
                        </select>
                    </div>
                    <input type="hidden" name="cons_id" value="<?php echo $cons_id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('consultation') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>

        </div>
    </div>
</div>