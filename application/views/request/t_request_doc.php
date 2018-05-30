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
        <h2>T_request List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>IdEmployee</th>
		<th>Subject</th>
		<th>Message</th>
		<th>AppvDepCh</th>
		<th>AppGenMan</th>
		<th>DateAppvDepCh</th>
		<th>DateAppGenMan</th>
		<th>DateRequest</th>
		<th>RequestState</th>
		
            </tr><?php
            foreach ($request_data as $request)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $request->idEmployee ?></td>
		      <td><?php echo $request->subject ?></td>
		      <td><?php echo $request->message ?></td>
		      <td><?php echo $request->appvDepCh ?></td>
		      <td><?php echo $request->appGenMan ?></td>
		      <td><?php echo $request->dateAppvDepCh ?></td>
		      <td><?php echo $request->dateAppGenMan ?></td>
		      <td><?php echo $request->dateRequest ?></td>
		      <td><?php echo $request->requestState ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>