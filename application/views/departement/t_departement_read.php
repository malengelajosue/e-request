
<div class="box box-infos">
    <div class="box-header with-border">
        <h3 class="box-title">Details departement</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <table class="table">
            <tr><td>Name</td><td><?php echo $name; ?></td></tr>
            <tr><td>IdChef</td><td><?php echo $idChef; ?></td></tr>
            <tr><td>Description</td><td><?php echo $description; ?></td></tr>
            <tr><td></td><td><a href="<?php echo site_url('departement') ?>" class="btn btn-default">Cancel</a></td></tr>
        </table>
    </div>
    <!-- /.box-body -->
</div>


