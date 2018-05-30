
<div class="box box-infos">
            <div class="box-header with-border">
              <h3 class="box-title">Details feedback</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                     <table class="table">
	    <tr><td>Subject</td><td><?php echo $subject; ?></td></tr>
	    <tr><td>Message</td><td><?php echo $message; ?></td></tr>
	    <tr><td>IdRequest</td><td><?php echo $idRequest; ?></td></tr>
	    <tr><td>IdEmployee</td><td><?php echo $idEmployee; ?></td></tr>
	    <tr><td>Document</td><td><?php echo $document; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('feedback') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
            <!-- /.box-body -->
          </div>

 
       