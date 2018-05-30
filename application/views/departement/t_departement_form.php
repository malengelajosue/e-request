
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create departement</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">Name <?php echo form_error('name') ?></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
            </div>
            <div class="form-group">
               
               
                <select type="text" class="form-control" name="idChef" id="idChef" placeholder="IdChef">
                    <option value="None">Nome</option>
                    <?php foreach ($employees as $emp):?>
                    <option value="<?=$emp->id?>"><?=$emp->matricule.' '.$emp->firstName.' '.$emp->lastName?></option>>
                    <?php endforeach;?>
                    </select>
            </div>
            <div class="form-group">
                <label for="varchar">Description <?php echo form_error('description') ?></label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('departement') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
    <!-- /.box-body -->
</div>


