
<div class="box box-infos">
    <div class="box-header with-border">
        <h3 class="box-title">Details user</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <table class="table">
            <tr><td>IdEmployee</td><td><?php echo $idEmployee; ?></td></tr>
            <tr><td>Username</td><td><?php echo $username; ?></td></tr>
            <tr><td>Password</td><td><?php echo $password; ?></td></tr>
            <tr><td>DateCreation</td><td><?php echo $dateCreation; ?></td></tr>
            <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
        </table>
    </div>
    <!-- /.box-body -->
</div>


