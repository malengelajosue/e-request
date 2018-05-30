 <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>'. $this->session->userdata('message').'</div>' : ''; ?>
                </div>
<div class="col-md-4 text-center">
               
            </div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create request</h3>

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
                <label for="varchar">Amount <?php echo form_error('amount') ?></label>
                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Currency <?php echo form_error('currency') ?></label>
                <select type="text" class="form-control" name="currency" id="amount" >
                    <option value="USD">USD</option>
                    <option value="CDF">CDF</option>
                    </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('request') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
    <!-- /.box-body -->
</div>


