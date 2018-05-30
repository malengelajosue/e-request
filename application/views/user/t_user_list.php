
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">List of users</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('user/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('user/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                            if ($q <> '') {
                                ?>
                                <a href="<?php echo site_url('user'); ?>" class="btn btn-default">Reset</a>
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
                <th>IdEmployee</th>
                <th>Username</th>
                <th>Password</th>
                <th>DateCreation</th>
                <th>Action</th>
            </tr><?php
            foreach ($user_data as $user) {
                ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $user->idEmployee ?></td>
                    <td><?php echo $user->username ?></td>
                    <td><?php echo $user->password ?></td>
                    <td><?php echo $user->dateCreation ?></td>
                    <td style="text-align:center" width="200px">
                        <?php
                        echo anchor(site_url('user/read/' . $user->id), 'Read');
                        echo ' | ';
                        echo anchor(site_url('user/update/' . $user->id), 'Update');
                        echo ' | ';
                        echo anchor(site_url('user/delete/' . $user->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
                <?php echo anchor(site_url('user/word'), 'Word', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>



