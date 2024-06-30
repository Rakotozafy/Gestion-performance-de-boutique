<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Information du Docteur</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Immatriculation <?php echo form_error('doc_nom') ?></label>
                        <input type="text" class="form-control" name="doc_im" id="doc_im" placeholder="numero d'immatriculation" value="<?php echo $doc_im; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nom <?php echo form_error('doc_nom') ?></label>
                        <input type="text" class="form-control" name="doc_nom" id="doc_nom" placeholder="nom du docteur" value="<?php echo $doc_nom; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Prenom <?php echo form_error('doc_prenom') ?></label>
                        <input type="text" class="form-control" name="doc_prenom" id="doc_prenom" placeholder="prenom du Prenom" value="<?php echo $doc_prenom; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Service <?php echo form_error('doc_service') ?></label>
                        <select name="doc_service" id="doc_service" class="form-control">
                            <option value="urgence">urgence</option>
                            <option value="neurologie">neurologie</option>
                            <option value="ophtamologie">ophtamologie</option>
                            <option value="radiologie">radiologie</option>
                            <option value="cardiologie">cardiologie</option>
                            <option value="diabetologie">diabetologie</option>
                            <option value="gynecologie">gynecologie</option>
                            <option value="laboratoire">laboratoire</option>
                            <option value="rhumatologie">rhumatologie</option>
                            <option value="dietetique">dietetique</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type <?php echo form_error('doc_service') ?></label>
                        <select name="doc_type" id="doc_type" class="form-control">
                            <option value="geriatre">geriatre</option>
                            <option value="gynecologue">gynecologue</option>
                            <option value="interniste">interniste</option>
                            <option value="médecin generaliste">médecin generaliste</option>
                            <option value="médecin de santé publique">médecin de santé publique</option>
                            <option value="médecin de travail">médecin de travail</option>
                            <option value="médecin biologiste">médecin biologiste</option>
                            <option value="médecin neurologiste">médecin neurologiste</option>
                            <option value="médecin de reanimation">médecin de reanimation</option>
                            <option value="pediatre">pediatre</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('docteur') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>