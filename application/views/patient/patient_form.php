<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">information du patient</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Nom  <?php echo form_error('pat_nom') ?></label>
                        <input type="text" class="form-control" name="pat_nom" id="pat_nom" placeholder="Nom " value="<?php echo $pat_nom; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Prenom <?php echo form_error('pat_prenom') ?></label>
                        <input type="text" class="form-control" name="pat_prenom" id="pat_prenom" placeholder="Prenom" value="<?php echo $pat_prenom; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Date de Naissance <?php echo form_error('pat_dateNaissance') ?></label>
                        <input type="date" class="form-control" name="pat_dateNaissance" id="pat_dateNaissance" placeholder="Pat DateNaissance" value="<?php echo $pat_dateNaissance; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Sexe <?php echo form_error('pat_sexe') ?></label>
                        <select name="pat_sexe" id="pat_sexe" class="form-control">
                            <option value="masculin">Masculin</option>
                            <option value="feminin">Féminin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Addresse <?php echo form_error('pat_addresse') ?></label>
                        <input type="text" class="form-control" name="pat_addresse" id="pat_addresse" value="<?php echo $pat_addresse; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Commune <?php echo form_error('pat_commune') ?></label>
                        <input type="text" class="form-control" name="pat_commune" id="pat_commune" value="<?php echo $pat_commune; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Profession <?php echo form_error('pat_profession') ?></label>
                        <input type="text" class="form-control" name="pat_profession" id="pat_profession" placeholder=" Profession" value="<?php echo $pat_profession; ?>" />
                    </div>
                    <div>
                        <label for="int">Type de patient <?php echo form_error('tp_id') ?></label>
                        <select name="tp_id" id="tp_id" class="form-control">
                        <?php foreach ($typedepatients as $patient) {
                                echo "<option value='" . $patient->tp_id . "'>" . $patient->tp_typeDePatient . "</option>";
                            } ?>
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="varchar">Status<?php echo form_error('pat_status') ?></label>
                        <select name="pat_status" id="pat_status" class="form-control">
                            <option value="Hopitalise">Hopitalisé</option>
                            <option value="Externe">Externe</option>
                        </select>
                    </div>
                    <input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('patient') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>

        </div>
    </div>
</div>
