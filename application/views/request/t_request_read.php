
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Details of request</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <tr><td>Employee</td><td><?php echo $employee; ?></td></tr>
            <tr><td>Departement</td><td><?php echo $departement; ?></td></tr>
            <tr><td>Subject</td><td><?php echo $subject; ?></td></tr>
            <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
            <tr><td>Currency</td><td><?php echo $currency; ?></td></tr>
            <tr><td>Message</td><td><?php echo $message; ?></td></tr>
            <tr><td>Departemental head Approuval </td><td><?php echo $appvDepCh <> ''? $appvDepCh :'Waiting for approuval' ; ?></td></tr>
            <tr><td>General Manager approuval</td><td><?php echo $appGenMan <> ''? $appGenMan :'Waiting for approuval'; ?></td></tr>
            <tr><td>Date Departemental head Approuval </td><td><?php echo $dateAppvDepCh; ?></td></tr>
            <tr><td>Date General Manager approuval</td><td><?php echo $dateAppGenMan; ?></td></tr>
            <tr><td>Date of request</td><td><?php echo $dateRequest; ?></td></tr>
            <tr><td>Request state</td><td><?php echo $requestState; ?></td></tr>
           
        </table>
    </div>
    <div class="box-footer">
        <a href="<?php echo site_url('request') ?>" class="btn btn-default">Cancel</a>
    </div>
    <!-- /.box-body -->
</div>


