<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Liste des quittances de consultation</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                <?php echo anchor(site_url('consultation/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>No de Consultation</th>
                                <th>Date Consultation</th>
                                <th>Montant </th>
                                <th>Validation</th>
                                <th>Nom de patient</th>
                                <th>Docteur attribuée</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($consultation_data as $consultation) { ?>
                            <tr>
                                    <td>
                                        <strong><?php echo $consultation->cons_numero ?></strong>
                                    </td>
                                    <td><?php echo $consultation->cons_dateConsultation ?></td>
                                    <td><?php echo $consultation->cons_cout ?></td>
                                    <td><?php echo $consultation->con_validation ?></td>
                                    <td><?php echo $consultation->pat_nom ?></td>
                                    <td><?php echo $consultation->doc_nom ?></td>
                                    <td class="text-center">
                                        <?php

                                    //  echo anchor(site_url('consultation/read/' . $consultation->cons_id), 'Read', array('class'=> 'btn btn-info '));
                                        echo anchor(site_url('consultation/update/' . $consultation->cons_id), 'Update', array('class'=> 'btn btn-success '));
                                        echo ' | ';
                                        echo anchor(site_url('consultation/delete/' . $consultation->cons_id), 'Delete', array('class'=> 'btn btn-danger '), 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                        ?>
                                    </td>
                            </tr>
                        <?php  }?>
                        </tbody>
                    </table>
                       <div class="row">
            <div class="col-md-6">	<?php echo anchor(site_url('Consultation/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
                </div>
            </div>
        </div>
    </div>
</div>