
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">create employees</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">Matricule <?php echo form_error('matricule') ?></label>
                <input type="text" class="form-control" name="matricule" id="matricule" placeholder="Matricule" value="<?php echo $matricule; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">First name <?php echo form_error('firstName') ?></label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="FirstName" value="<?php echo $firstName; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Last name <?php echo form_error('lastName') ?></label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="LastName" value="<?php echo $lastName; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Gender <?php echo form_error('gender') ?></label>
                <select type="text" class="form-control" name="gender" id="gender" placeholder="Gender"  >
                    <option value="Female">Female</option>  
                    <option value="Male">Male</option>  
                </select>
            </div>
            <div class="form-group">
                <label for="varchar">Email <?php echo form_error('email') ?></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Telephone <?php echo form_error('telephone') ?></label>
                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone" value="<?php echo $telephone; ?>" />
            </div>
            <div class="form-group">
                <label for="int">Departement <?php echo form_error('idDepartement') ?></label>
                
                <select type="text" class="form-control" name="idDepartement" id="idDepartement" placeholder="IdDepartement" >
                    <?php foreach($departements as $dep):?>
                    <option value="<?=$dep->id?>"><?=$dep->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('employee') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
    <!-- /.box-body -->
</div>


