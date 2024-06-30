<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Information de l'utilisateur</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Nom <?php echo form_error('util_nom') ?></label>
                        <input type="text" class="form-control" name="util_nom" id="util_nom" value="<?php echo $util_nom; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Prénom <?php echo form_error('util_prenom') ?></label>
                        <input type="text" class="form-control" name="util_prenom" id="util_prenom" value="<?php echo $util_prenom; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Mail <?php echo form_error('util_mail') ?></label>
                        <input type="text" class="form-control" name="util_mail" id="util_mail" value="<?php echo $util_mail; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Login <?php echo form_error('util_login') ?></label>
                        <input type="text" class="form-control" name="util_login" id="util_login"  value="<?php echo $util_login; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">mot de passe <?php echo form_error('util_mdp') ?></label>
                        <input type="password" class="form-control" name="util_mdp" id="util_mdp" value="<?php echo $util_mdp; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Type <?php echo form_error('type') ?></label>
                        <select name="type" id="type" class="form-control">
                            <option value="1">Administrateur</option>
                            <option value="2">Personnel d'acceuil</option>
                            <option value="3">Personnel de session</option>
                            <option value="4">Secretaire d'admnistration</option>
                        </select>
                    </div>
                    <input type="hidden" name="util_id" value="<?php echo $util_id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('utilisateur') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>

        </div>
    </div>
</div>
