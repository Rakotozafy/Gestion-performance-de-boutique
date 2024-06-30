<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Liste des quittances d'analyse</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                <?php echo anchor(site_url('analyse/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Gamme d'analyse</th>
                                <th>Somme</th>
                                <th>Nom patient</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($analyse_data as $analyse) { ?>
                                <tr>
                                    <td><?php echo $analyse->al_description ?></td>
                                    <td><?php echo $analyse->alG_nom ?></td>
                                    <td><?php echo $analyse->al_somme ?></td>
                                    <td><?php echo $analyse->pat_nom ?></td>
                                    <td><?php echo $analyse->alG_status ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        echo anchor(site_url('analyse/update/' . $analyse->al_id), 'Update', array('class'=> 'btn btn-success '));
                                        echo ' | ';
                                        echo anchor(site_url('analyse/delete/' . $analyse->al_id), 'Delete', array('class'=> 'btn btn-danger '), 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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