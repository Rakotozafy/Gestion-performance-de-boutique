<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Liste des quittances de banque de sang</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                <?php echo anchor(site_url('banquedesang/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Desciption</th>
                                <th>Somme</th>
                                <th>Nom patient</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($banquedesang_data as $banquedesang) { ?>
                                <tr>
                                    <td width="80px"><?php echo ++$start ?></td>
                                    <td><?php echo $banquedesang->bds_desciption ?></td>
                                    <td><?php echo $banquedesang->bds_somme ?></td>
                                    <td><?php echo $banquedesang->pat_nom ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php

                                        echo anchor(site_url('banquedesang/update/' . $banquedesang->bds_id), 'Update', array('class' => 'btn btn-success '));
                                        echo ' | ';
                                        echo anchor(site_url('banquedesang/delete/' . $banquedesang->bds_id), 'Delete', array('class' => ' btn btn-danger btn-sm '), 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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