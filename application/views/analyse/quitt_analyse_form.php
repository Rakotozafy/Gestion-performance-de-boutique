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
                        <label for="varchar">Description <?php echo form_error('al_description') ?></label>
                        <input type="text" class="form-control" name="al_description" id="al_description" value="<?php echo $al_description; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Somme <?php echo form_error('al_somme') ?></label>
                        <input type="text" class="form-control" name="al_somme" id="al_somme" value="<?php echo $al_somme; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Gamme d'analyse<?php echo form_error('alG_id') ?></label>
                        <select name="alG_id" id="alG_id" class="form-control">
                            <?php foreach ($gammeAnalyse as $gamme) {
                                echo "<option value='" . $gamme->alG_id . "'>" . $gamme->alG_nom . "</option>";
                            } ?>
                        </select>
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
                        <label for="int">Status <?php echo form_error('alG_status') ?></label>
                        <input type="text" class="form-control" name="alG_status" id="alG_status" value="<?php echo $alG_status; ?>" />
                    </div>
                    <input type="hidden" name="al_id" value="<?php echo $al_id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('analyse') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>