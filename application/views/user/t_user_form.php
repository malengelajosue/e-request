
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create user</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="int">Employee <?php echo form_error('idEmployee') ?></label>
                <select type="text" class="form-control" name="idEmployee" id="idEmployee" placeholder="IdEmployee">
                    <?php foreach ($employees as $emp):?>
                    <option value="<?=$emp->id?>"><?=$emp->matricule.' '.$emp->firstName.' '.$emp->lastName?></option>
                    <?php endforeach;?>
                </select> 
            </div>
            <div class="form-group">
                <label for="varchar">Username <?php echo form_error('username') ?></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Password <?php echo form_error('password') ?></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"  />
            </div>
            <div class="form-group">
                <label for="varchar">Confirm password <?php echo form_error('confPassword') ?></label>
                <input type="password" class="form-control" name="confPassword" id="password" placeholder="Password confirmation" " />
            </div>
            <div class="form-group">
                <label for="idType">Type of user <?php echo form_error('idType') ?></label>
                <select type="text" class="form-control" name="idType" id="dateCreation" placeholder="Type of user" >
                    <?php foreach ($types as $type):?>
                    <option value="<?=$type->id?>"><?=$type->name?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
    <!-- /.box-body -->
</div>


