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
        <h2>T_cash List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Currency</th>
		<th>Amount</th>
		<th>Description</th>
		
            </tr><?php
            foreach ($cash_data as $cash)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $cash->name ?></td>
		      <td><?php echo $cash->currency ?></td>
		      <td><?php echo $cash->amount ?></td>
		      <td><?php echo $cash->description ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>