
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">List of feedbacks</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('feedback/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                            if ($q <> '') {
                                ?>
                                <a href="<?php echo site_url('feedback'); ?>" class="btn btn-default">Reset</a>
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
                <th>Subject</th>
                <th>Message</th>
                <th>IdRequest</th>
                <th>IdEmployee</th>
                <th>Document</th>
                <th>Action</th>
            </tr><?php
            foreach ($feedback_data as $feedback) {
                ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $feedback->subject ?></td>
                    <td><?php echo $feedback->message ?></td>
                    <td><?php echo $feedback->idRequest ?></td>
                    <td><?php echo $feedback->idEmployee ?></td>
                    <td><?php echo $feedback->document ?></td>
                    <td style="text-align:center" width="200px">
                        <?php
                        echo anchor(site_url('feedback/read/' . $feedback->id), 'Read');
                        echo ' | ';
                        echo anchor(site_url('feedback/update/' . $feedback->id), 'Update');
                        echo ' | ';
                        echo anchor(site_url('feedback/delete/' . $feedback->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<div>
    <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
            <?php echo anchor(site_url('feedback/word'), 'Word', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-6 text-right">
            <?php echo $pagination ?>
        </div>
    </div>
</div>



