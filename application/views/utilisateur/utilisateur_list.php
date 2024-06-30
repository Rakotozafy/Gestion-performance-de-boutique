<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Liste des utilisateurs</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                <?php echo anchor(site_url('utilisateur/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Login</th>
                                <th>Mail</th>
                                <th>Type</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($utilisateur_data as $utilisateur) {?>
                            <tr>
                                <td><?php echo $utilisateur->util_login ?></td>
                                <td><?php echo $utilisateur->util_mail ?></td>
                                <td><?php echo $utilisateur->tutil_designation ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php
                                    echo anchor(site_url('utilisateur/update/' . $utilisateur->util_id), 'Update', array('class'=> 'btn btn-success '));
                                    echo '   ';
                                    echo anchor(site_url('utilisateur/delete/' . $utilisateur->util_id), 'Delete', array('class'=> 'btn btn-danger '), 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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