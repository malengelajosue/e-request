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
        <h2 style="margin-top:0px">T_comment <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="comment">Comment <?php echo form_error('comment') ?></label>
            <textarea class="form-control" rows="3" name="comment" id="comment" placeholder="Comment"><?php echo $comment; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">DateComment <?php echo form_error('dateComment') ?></label>
            <input type="text" class="form-control" name="dateComment" id="dateComment" placeholder="DateComment" value="<?php echo $dateComment; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdRequest <?php echo form_error('idRequest') ?></label>
            <input type="text" class="form-control" name="idRequest" id="idRequest" placeholder="IdRequest" value="<?php echo $idRequest; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdEmployee <?php echo form_error('idEmployee') ?></label>
            <input type="text" class="form-control" name="idEmployee" id="idEmployee" placeholder="IdEmployee" value="<?php echo $idEmployee; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('comment') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>