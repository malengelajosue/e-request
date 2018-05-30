
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Comment a request</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="center-block">
             <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="comment">Comment <?php echo form_error('comment') ?></label>
            <textarea class="form-control" rows="3" name="comment" id="comment" placeholder="Comment"><?php echo $comment; ?></textarea>
        </div>
	   
	    
	 
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('comment') ?>" class="btn btn-default">Cancel</a>
	</form>
        </div>
    </div>
    <!-- /.box-body -->
</div>


<script >
     $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>

