
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">List of requests</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        
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
                <form action="<?php echo site_url('request/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                            if ($q <> '') {
                                ?>
                                <a href="<?php echo site_url('request'); ?>" class="btn btn-default">Reset</a>
                                <?php
                            }
                            ?>
                            <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover table-responsive" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Employee</th>
                <th>Subject</th>
                <th>amount</th>
                <th></th>

                <th>D. Cheif</th>
                <th>G.Manager</th>
                <th>State</th>

                <th>Progress</th>
                <th>Label</th>
                <th>Departement</th>

                <th>Date</th>

                <th>Action</th>
                <th></th>
                <th></th>
               

            </tr><?php
            foreach ($request_data as $request) {
                ?>
                <tr>
                    <td><?php echo ++$start ?></td>
                    <td><?php echo $request->employee ?></td>
                    <td><?php echo substr($request->subject,0,20).'..' ?></td>
                    <td><?php echo $request->amount ?></td>
                    <td><?php echo $request->currency ?></td>

                    <td><?php echo $request->appvDepCh <> '' ? '<span class="badge bg-aqua">Approuved</span>' : '<span class=" badge bg-yellow">Waiting ...</span>'?></td>
                    <td><?php echo $request->appGenMan <> '' ? '<span class="badge bg-aqua">Approuved</span>': '<span class=" badge bg-yellow">Waiting ...</span>' ?></td>
                    <td><?php if($request->closed=='closed'){
                        echo '<span class="badge bg-green">Closed</span>';
                    }else if ($request->closed=='discarded'){
                        echo ' <span class=" badge bg-red">Discarded</span>';
                    }else{
                        echo '  <span class=" badge bg-yellow">Waiting..</span>';
                    } ?></td>

                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php
                            if ($request->closed == 'discarded') {
                                echo '0%';
                            } else if ($request->appvDepCh != 'approuved' and $request->appGenMan != 'approuved' and $request->closed != 'discarded') {
                                echo '5%';
                            } else if ($request->appvDepCh == 'approuved' and $request->appGenMan != 'approuved' and $request->closed != 'discarded') {
                                echo '45%';
                            } else if ($request->appvDepCh == 'approuved' and $request->appGenMan == 'approuved' and $request->closed != 'closed' and $request->closed != 'discarded') {
                                echo '90%';
                            } else if ($request->appvDepCh == 'approuved' and $request->appGenMan == 'approuved' and $request->closed == 'closed' and $request->closed != 'discarded') {
                                echo '100% ';
                            } else {
                                echo '0%';
                            }
                            ?>">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-blue"><?php
                            if ($request->closed == 'discarded') {
                                echo '0%';
                            } else if ($request->appvDepCh != 'approuved' and $request->appGenMan != 'approuved') {
                                echo '5%';
                            } else if ($request->appvDepCh == 'approuved' and $request->appGenMan != 'approuved') {
                                echo '45%';
                            } else if ($request->appvDepCh == 'approuved' and $request->appGenMan == 'approuved' and $request->closed != 'closed') {
                                echo '90%';
                            } else if ($request->appvDepCh == 'approuved' or $request->appGenMan == 'approuved' and $request->closed == 'closed') {
                                echo '100%';
                            } else {
                                echo '0%';
                            }
                            ?></span>
                    </td>

                    <td><?php echo $request->departement ?></td>
                    <td><?php echo substr($request->dateRequest,0,10) ?></td>


                    <?php
                    echo '<td>' . anchor(site_url('request/read/' . $request->id), 'Details ') . '</td>';
                  
                        
                   if(($_SESSION['user']->id == 5 and $request->appGenMan == '' and $request->appvDepCh == '' ) )  echo '<td>' . anchor(site_url('request/update/' . $request->id), 'Update ') . '</td>';
                    ?>



                    <?php
                    //   echo ' | ';
                    // echo anchor(site_url('request/update/' . $request->id), 'Update');
                    // echo ' | ';
                    // echo anchor(site_url('request/comment/' . $request->id), 'Comment');

                    if ($_SESSION['user']->id == 2 or $_SESSION['user']->id == 3)
                        echo '<td>' . anchor(site_url('request/discard/' . $request->id), 'Discard','onclick="javasciprt: return confirm(\'Do you want to discard this request ?\')"') . '</td>';

                    if ($request->appGenMan == 'approuved' and $_SESSION['user']->id == 5)
                        echo '<td>' . anchor(site_url('request/feedback/' . $request->id), 'Give a feedback') . '</td>';



                    if ($_SESSION['user']->id == 2 or $_SESSION['user']->id == 3)
                        echo '<td>' . anchor(site_url('request/approuve/' . $request->id), 'Approuve') . '</td>';

                    if ($_SESSION['user']->id == 4 and $request->requestState != 'served' and $request->appGenMan == 'approuved')
                        echo '<td>' . anchor(site_url('request/serve/' . $request->id), 'Serve') . '</td>';
                    if ($_SESSION['user']->id == 4 and $request->appGenMan == 'approuved' and $request->closed != 'closed')
                        echo '<td>' . anchor(site_url('request/close/' . $request->id), 'Close') . '</td>';
                    ?>

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
                <?php // echo anchor(site_url('request/word'), 'Word', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>


