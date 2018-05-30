
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Details cash</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <table class="table">
            <tr><td>Name</td><td><?php echo $name; ?></td></tr>
            <tr><td>Currency</td><td><?php echo $currency; ?></td></tr>
            <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
            <tr><td>Description</td><td><?php echo $description; ?></td></tr>
            <tr><td></td><td><a href="<?php echo site_url('cash') ?>" class="btn btn-default">Cancel</a></td></tr>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<h2 style="margin-top:0px">T_cash Read</h2>

