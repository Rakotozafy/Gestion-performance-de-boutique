<!doctype html>
<html>
    <head>
        <title>CHU</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Liste consultation</h2>
        <table class="word-table" style="margin-bottom: 10px">
           <tr>
                                <th>No de Consultation</th>
                                <th>Date Consultation</th>
                                <th>Montant </th>
                                <th>Validation</th>
                                <th>Nom de patient</th>
                                <th>Docteur </th>
                            </tr>
                <?php foreach ($consultation_data as $consultation) { ?>
        
             <td>
                                        <strong><?php echo $consultation->cons_numero ?></strong>
                                    </td>
                                    <td><?php echo $consultation->cons_dateConsultation ?></td>
                                    <td><?php echo $consultation->cons_cout ?></td>
                                    <td><?php echo $consultation->con_validation ?></td>
                                    <td><?php echo $consultation->pat_nom ?> <?php echo $consultation->pat_prenom ?></td>
                                    <td><?php echo $consultation->doc_nom ?> <?php echo $consultation->doc_nom ?></td>
                </tr>''
                <?php
            }
            ?>
        </table>
    </body>
</html>