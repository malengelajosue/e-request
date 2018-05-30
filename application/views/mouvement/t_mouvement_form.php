
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create request</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="int">IdCash <?php echo form_error('idCash') ?></label>
                <select type="text" class="form-control" name="idCash" id="idCash" placeholder="IdCash" value="<?php echo $idCash; ?>" >
                    <?php foreach ($cashs as $cash): ?>
                        <option value="<?= $cash->id ?>"><?= $cash->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="double">Amount <?php echo form_error('amount') ?></label>
                <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
            </div>
           
           
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('mouvement') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
    <!-- /.box-body -->
</div>


