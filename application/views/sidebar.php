  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'asset' ?>/img/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <!-- tampil user yang sedang login -->
          <p><?php echo $this->tampil_user->user_login()->nama_lengkap; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li <?=$this->uri->segment(1)=='dashboard' || $this->uri->segment(1)=='' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url().'index.php/dashboard' ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>

        <!-- Menu Yang Tampil Jika Login Sebagai Admin  -->
        <?php  

          if($this->session->userdata('level') == 'admin'){

        ?>

        <li <?=$this->uri->segment(1)=='supplier' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url().'index.php/supplier' ?>"><i class="fa fa-truck"></i> <span>Suppliers</span></a>
        </li>

        <li <?=$this->uri->segment(1)=='customer' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url().'index.php/customer' ?>"><i class="fa fa-users"></i> <span>Customers</span></a>
        </li>
        
        <li class="treeview <?=$this->uri->segment(1)=='kategori' || $this->uri->segment(1)=='unit' || $this->uri->segment(1)=='item' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-industry"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li <?=$this->uri->segment(1)=='kategori' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url().'index.php/kategori' ?>"><i class="fa fa-circle-o"></i> Kategori</a>
            </li>

            <li <?=$this->uri->segment(1)=='unit' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url().'index.php/unit' ?>"><i class="fa fa-circle-o"></i> Unit</a>
            </li>

            <li <?=$this->uri->segment(1)=='item' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url().'index.php/item' ?>"><i class="fa fa-circle-o"></i> Item</a>
            </li>

          </ul>
        </li>

        <?php } ?>
        <!-- / Menu Yang Tampil Jika Login Sebagai Admin  -->

        <li class="treeview <?=$this->uri->segment(1)=='sales' || $this->uri->segment(1)=='stockIn' || $this->uri->segment(1)=='stockOut' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li <?= $this->uri->segment(1)=='sales' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url().'index.php/sales' ?>"><i class="fa fa-circle-o"></i> Sales</a>
            </li>

            <li <?= $this->uri->segment(1)=='stockIn' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url().'index.php/stockIn' ?>"><i class="fa fa-circle-o"></i> Stock In</a>
            </li>

            <li <?= $this->uri->segment(1)=='stockOut' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url().'index.php/stockOut' ?>"><i class="fa fa-circle-o"></i> Stock Out</a>
            </li>
          </ul>
        </li>

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li> -->
        
        <?php if($this->session->userdata('level')=='admin'){ ?>
        <li class="header">SETTINGS</li>
        <li><a href="<?php echo base_url().'index.php/user' ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <?php } ?>

        <li>
          <a href="<?php echo base_url().'index.php/login/sign_out' ?>"><i class="fa fa-close" style="color: red"></i> <span>Logout</span></a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->