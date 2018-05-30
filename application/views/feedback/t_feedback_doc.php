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
        <h2>T_feedback List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Subject</th>
		<th>Message</th>
		<th>IdRequest</th>
		<th>IdEmployee</th>
		<th>Document</th>
		
            </tr><?php
            foreach ($feedback_data as $feedback)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $feedback->subject ?></td>
		      <td><?php echo $feedback->message ?></td>
		      <td><?php echo $feedback->idRequest ?></td>
		      <td><?php echo $feedback->idEmployee ?></td>
		      <td><?php echo $feedback->document ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>