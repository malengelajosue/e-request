
<div class="box box-infos">
    <div class="box-header with-border">
        <h3 class="box-title">create employee</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <table class="table">
            <tr><td>Matricule</td><td><?php echo $matricule; ?></td></tr>
            <tr><td>FirstName</td><td><?php echo $firstName; ?></td></tr>
            <tr><td>LastName</td><td><?php echo $lastName; ?></td></tr>
            <tr><td>Gender</td><td><?php echo $gender; ?></td></tr>
            <tr><td>Email</td><td><?php echo $email; ?></td></tr>
            <tr><td>Telephone</td><td><?php echo $telephone; ?></td></tr>
            <tr><td>IdDepartement</td><td><?php echo $idDepartement; ?></td></tr>
            <tr><td></td><td><a href="<?php echo site_url('employee') ?>" class="btn btn-default">Cancel</a></td></tr>
        </table>
    </div>
    <!-- /.box-body -->
</div>


