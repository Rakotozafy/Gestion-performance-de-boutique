<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Recapitulatif de payement des docteurs</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>No Immatricule</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Montant</th>
                            </tr>
                        </thead>
                        <tbody>    
                            <?php foreach($recapdocteurs as $rec){?>
                            <tr>
                                <td><?php echo $rec->doc_im;?></td>
                                <td><?php echo $rec->doc_nom;?></td>
                                <td><?php echo $rec->doc_prenom;?></td>
                                <td><?php echo $rec->pourcentage; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>