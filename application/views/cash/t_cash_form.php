
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">List create cash</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          
        </div>
    </div>
    <div class="box-body">
        <div class="center-block">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">Name <?php echo form_error('name') ?></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Currency <?php echo form_error('currency') ?></label>
                    <input type="text" class="form-control" name="currency" id="currency" placeholder="Currency" value="<?php echo $currency; ?>" />
                </div>
                <div class="form-group">
                    <label for="double">Amount <?php echo form_error('amount') ?></label>
                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Description <?php echo form_error('description') ?></label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('cash') ?>" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>

</div>


