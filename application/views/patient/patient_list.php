<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Liste des patients</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                <?php echo anchor(site_url('patient/create'), 'Create', 'class="btn btn-primary"'); ?>
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
                                <th>Date de Naissance</th>
                                <th>Sexe</th>
                                <th>Pat Addresse</th>
                                <th>Commune</th>
                                <th>Profession</th>
                                <th>Type de patient</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patient_data as $patient) { ?>
                                <tr>
                                    <td><?php echo $patient->pat_nom ?></td>
                                    <td><?php echo $patient->pat_prenom ?></td>
                                    <td><?php echo $patient->pat_dateNaissance ?></td>
                                    <td><?php echo $patient->pat_sexe ?></td>
                                    <td><?php echo $patient->pat_addresse ?></td>
                                    <td><?php echo $patient->pat_commune ?></td>
                                    <td><?php echo $patient->pat_profession ?></td>
                                    <td><?php echo $patient->tp_id ?></td>
                                    <td><?php echo $patient->pat_status ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                        
                                        echo anchor(site_url('patient/update/' . $patient->pat_id), 'Update', array('class'=> 'btn btn-success '));
                                        echo ' | ';
                                        echo anchor(site_url('patient/delete/' . $patient->pat_id), 'Delete', array('class'=> 'btn btn-danger '), 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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