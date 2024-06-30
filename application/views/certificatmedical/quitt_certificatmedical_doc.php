<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>Quitt_certificatmedical List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Cm Designation</th>
		<th>Cm Somme</th>
		<th>Pat Id</th>
		<th>Doc Im</th>
		
            </tr><?php
            foreach ($certificatmedical_data as $certificatmedical)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $certificatmedical->cm_designation ?></td>
		      <td><?php echo $certificatmedical->cm_somme ?></td>
		      <td><?php echo $certificatmedical->pat_id ?></td>
		      <td><?php echo $certificatmedical->doc_im ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>