
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">List of cashs</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
           
        </div>
    </div>
    <div class="box-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('cash/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('cash/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                            if ($q <> '') {
                                ?>
                                <a href="<?php echo site_url('cash'); ?>" class="btn btn-default">Reset</a>
                                <?php
                            }
                            ?>
                            <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Currency</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Action</th>
            </tr><?php
            foreach ($cash_data as $cash) {
                ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $cash->name ?></td>
                    <td><?php echo $cash->currency ?></td>
                    <td><?php echo $cash->amount ?></td>
                    <td><?php echo $cash->description ?></td>
                    <td style="text-align:center" width="200px">
                        <?php
                        echo anchor(site_url('cash/read/' . $cash->id), 'Read');
                        echo ' | ';
                        echo anchor(site_url('cash/update/' . $cash->id), 'Update');
                        echo ' | ';
                        echo anchor(site_url('cash/delete/' . $cash->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                <?php echo anchor(site_url('cash/word'), 'Word', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>



