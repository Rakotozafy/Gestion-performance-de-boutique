<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Liste des docteurs</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                <?php echo anchor(site_url('docteur/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Service</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($docteur_data as $docteur) { ?>
                                <tr>
                                    <td><?php echo $docteur->doc_nom ?></td>
                                    <td><?php echo $docteur->doc_prenom ?></td>
                                    <td><?php echo $docteur->doc_service ?></td>
                                    <td><?php echo $docteur->doc_type ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        echo anchor(site_url('docteur/update/' . $docteur->doc_im), 'Update', array('class'=> 'btn btn-success '));
                                        echo ' | ';
                                        echo anchor(site_url('docteur/delete/' . $docteur->doc_im), 'Delete', array('class'=> 'btn btn-danger '), 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>