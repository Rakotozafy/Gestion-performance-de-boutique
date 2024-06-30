<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Liste des quittances des hebergements</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                <?php echo anchor(site_url('hebergement/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Service</th>
                                <th>Date d'entre</th>
                                <th>Date de Sortie</th>
                                <th>Categorie</th>
                                <th>Prix</th>
                                <th>Somme</th>
                                <th>Nom de patient</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($hebergement_data as $hebergement) { ?>
                                <tr>
                                    <td><?php echo $hebergement->hb_numero ?></td>
                                    <td><?php echo $hebergement->hb_service ?></td>
                                    <td><?php echo $hebergement->hb_dateEntre ?></td>
                                    <td><?php echo $hebergement->hb_dateSortie ?></td>
                                    <td><?php echo $hebergement->hb_categorie ?></td>
                                    <td><?php echo $hebergement->hb_prix ?></td>
                                    <td><?php echo $hebergement->hb_somme ?></td>
                                    <td><?php echo $hebergement->pat_nom ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        echo ' | ';
                                        echo anchor(site_url('hebergement/update/' . $hebergement->hb_id), 'Update', array('class'=> 'btn btn-success '));
                                        echo ' | ';
                                        echo anchor(site_url('hebergement/delete/' . $hebergement->hb_id), 'Delete', array('class'=> 'btn btn-danger '), 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
