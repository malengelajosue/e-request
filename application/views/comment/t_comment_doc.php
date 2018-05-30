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
        <h2>T_comment List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Comment</th>
		<th>DateComment</th>
		<th>IdRequest</th>
		<th>IdEmployee</th>
		
            </tr><?php
            foreach ($comment_data as $comment)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $comment->comment ?></td>
		      <td><?php echo $comment->dateComment ?></td>
		      <td><?php echo $comment->idRequest ?></td>
		      <td><?php echo $comment->idEmployee ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>