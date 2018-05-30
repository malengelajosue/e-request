
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">create feedback</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">Subject <?php echo form_error('subject') ?></label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?php echo $subject; ?>" />
            </div>
            <div class="form-group">
                <label for="message">Message <?php echo form_error('message') ?></label>
                <textarea class="form-control" rows="3" name="message" id="message" placeholder="Message"><?php echo $message; ?></textarea>
            </div>
            
          
            <div class="form-group">
                <label for="varchar">Document <?php echo form_error('document') ?></label>
                <input type="text" class="form-control" name="document" id="document" placeholder="Document" value="<?php echo $document; ?>" />
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('feedback') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
    <!-- /.box-body -->
</div>


