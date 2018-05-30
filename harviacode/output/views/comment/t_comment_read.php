<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T_comment Read</h2>
        <table class="table">
	    <tr><td>Comment</td><td><?php echo $comment; ?></td></tr>
	    <tr><td>DateComment</td><td><?php echo $dateComment; ?></td></tr>
	    <tr><td>IdRequest</td><td><?php echo $idRequest; ?></td></tr>
	    <tr><td>IdEmployee</td><td><?php echo $idEmployee; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('comment') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>