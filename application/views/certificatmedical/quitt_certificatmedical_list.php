<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">liste des quittances de certificat medicale</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                <?php echo anchor(site_url('certificatmedical/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Designation</th>
                                <th>Somme</th>
                                <th>Nom Patient</th>
                                <th>Docteur</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($certificatmedical_data as $certificatmedical) { ?>
                                <tr>
                                    <td width="80px"><?php echo ++$start ?></td>
                                    <td><?php echo $certificatmedical->cm_designation ?></td>
                                    <td><?php echo $certificatmedical->cm_somme ?></td>
                                    <td><?php echo $certificatmedical->pat_nom ?></td>
                                    <td><?php echo $certificatmedical->doc_nom ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        echo anchor(site_url('certificatmedical/update/' . $certificatmedical->cm_id), 'Update', array('class'=> 'btn btn-success '));
                                        echo ' | ';
                                        echo anchor(site_url('certificatmedical/delete/' . $certificatmedical->cm_id), 'Delete', array('class'=> 'btn btn-danger '), 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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

</html>