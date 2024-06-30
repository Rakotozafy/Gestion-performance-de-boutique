<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Liste de quittance radio</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                <?php echo anchor(site_url('radio/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Denomination</th>
                                <th>Somme</th>
                                <th>Nom de patient</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            foreach ($radio_data as $radio) { ?>
                                <tr>
                                    <td width="80px"><?php echo ++$start ?></td>
                                    <td><?php echo $radio->rd_denomination ?></td>
                                    <td><?php echo $radio->rd_somme ?></td>
                                    <td><?php echo $radio->pat_nom ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        
                                        echo anchor(site_url('radio/update/' . $radio->rd_id), 'Update', array('class'=> 'btn btn-success '));
                                        echo ' | ';
                                        echo anchor(site_url('radio/delete/' . $radio->rd_id), 'Delete', array('class'=> 'btn btn-danger '), 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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