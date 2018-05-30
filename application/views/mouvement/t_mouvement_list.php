
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">List of transactions</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('mouvement/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('mouvement/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                            if ($q <> '') {
                                ?>
                                <a href="<?php echo site_url('mouvement'); ?>" class="btn btn-default">Reset</a>
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
                <th>IdCash</th>
                <th>Amount</th>
                <th>DateModif</th>
                <th>ActionType</th>
                <th>Action</th>
            </tr><?php
            foreach ($mouvement_data as $mouvement) {
                ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $mouvement->idCash ?></td>
                    <td><?php echo $mouvement->amount ?></td>
                    <td><?php echo $mouvement->dateModif ?></td>
                    <td><?php echo $mouvement->actionType ?></td>
                    <td style="text-align:center" width="200px">
                        <?php
                        echo anchor(site_url('mouvement/read/' . $mouvement->id), 'Read');
                        echo ' | ';
                        echo anchor(site_url('mouvement/update/' . $mouvement->id), 'Update');
                        echo ' | ';
                        echo anchor(site_url('mouvement/delete/' . $mouvement->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <!-- /.box-body -->
    <div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                <?php echo anchor(site_url('mouvement/word'), 'Word', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
</div>



