
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Details comment</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height: 250px; width: 487px;" width="487" height="250"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        <h2 style="margin-top:0px">T_comment Read</h2>
        <table class="table">
	    <tr><td>Comment</td><td><?php echo $comment; ?></td></tr>
	    <tr><td>DateComment</td><td><?php echo $dateComment; ?></td></tr>
	    <tr><td>IdRequest</td><td><?php echo $idRequest; ?></td></tr>
	    <tr><td>IdEmployee</td><td><?php echo $idEmployee; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('comment') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       