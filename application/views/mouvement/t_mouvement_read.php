
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Details transactions</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <table class="table">
            <tr><td>IdCash</td><td><?php echo $idCash; ?></td></tr>
            <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
            <tr><td>DateModif</td><td><?php echo $dateModif; ?></td></tr>
            <tr><td>ActionType</td><td><?php echo $actionType; ?></td></tr>
            <tr><td></td><td><a href="<?php echo site_url('mouvement') ?>" class="btn btn-default">Cancel</a></td></tr>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<h2 style="margin-top:0px">T_mouvement Read</h2>

