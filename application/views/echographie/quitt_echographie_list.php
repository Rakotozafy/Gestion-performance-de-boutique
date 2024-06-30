<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Liste quittance d'echographie</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                <?php echo anchor(site_url('echographie/create'), 'Create', 'class="btn btn-primary"'); ?>
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
                                <th>Nom de patient</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($echographie_data as $echographie) { ?>
                                <tr>
                                    <td width="80px"><?php echo ++$start ?></td>
                                    <td><?php echo $echographie->echo_designation ?></td>
                                    <td><?php echo $echographie->echo_somme ?></td>
                                    <td><?php echo $echographie->pat_nom ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        echo anchor(site_url('echographie/update/' . $echographie->echo_id), 'Update', array('class'=> 'btn btn-success '));
                                        echo '   ';
                                        echo anchor(site_url('echographie/delete/' . $echographie->echo_id), 'Delete', array('class'=> 'btn btn-danger '), 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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