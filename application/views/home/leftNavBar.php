 <ul class="sidebar-menu" data-widget="tree">
     <?php if(isset($_SESSION['user']) and ($_SESSION['user']->idType==1 or $_SESSION['user']->idType==3 or $_SESSION['user']->idType==4 )){ ?>
      
     <li class="header">NAVIGATION</li>
         <li class="">
          <a href="<?php echo base_url()?>home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>
       <?php } ?>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>request"><i class="fa fa-list"></i> Requests</a></li>
            <li><a href="<?php echo base_url()?>request/create"><i class="fa fa-plus"></i> Add  request</a></li>
          </ul>
        </li>
        
        <li class="">
          <a href=" <?php echo base_url()?>feedback">
            <i class="fa fa-feed"></i> <span>Feedback</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>
        <?php if(isset($_SESSION['user']) and  $_SESSION['user']->idType!=5 ){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-circle"></i> <span>Employee</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>employee"><i class="fa fa-list"></i> Employees</a></li>
            <?php if (isset($_SESSION['user']) and $_SESSION['user']->idType==1) {
                
            ?>
            <li><a href="<?php echo base_url()?>employee/create"><i class="fa fa-plus"></i> Add employees</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php }?>
        <?php if (isset($_SESSION['user']) and $_SESSION['user']->idType==1) {
            
         ?>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-building-o"></i> <span>Departement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>departement"><i class="fa fa-list"></i> Departements</a></li>
            <li><a href="<?php echo base_url()?>departement/create"><i class="fa fa-plus"></i> Add Department</a></li>
            
          </ul>
        </li>
        <?php } ?>
         <?php if(isset($_SESSION['user']) and  $_SESSION['user']->idType==4 ){ ?>
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Cash</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>cash"><i class="fa fa-list"></i> Cashs</a></li>
            <li><a href="<?php echo base_url()?>mouvement"><i class="fa fa-list"></i> Transactions</a></li>
       
          </ul>
        </li>
         <?php }?>
    
         <?php if(isset($_SESSION['user']) and $_SESSION['user']->idType==1){ ?>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>user"><i class="fa fa-list"></i> Users</a></li>
            <li><a href="<?php echo base_url()?>user/create"><i class="fa fa-plus"></i> Add  user</a></li>
          </ul>
        </li>
         <?php } ?>
      </ul>


