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
        <h2>T_mouvement List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>IdCash</th>
		<th>Amount</th>
		<th>DateModif</th>
		<th>ActionType</th>
		
            </tr><?php
            foreach ($mouvement_data as $mouvement)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mouvement->idCash ?></td>
		      <td><?php echo $mouvement->amount ?></td>
		      <td><?php echo $mouvement->dateModif ?></td>
		      <td><?php echo $mouvement->actionType ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>