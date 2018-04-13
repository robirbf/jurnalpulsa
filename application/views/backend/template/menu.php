<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url();?>/_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin </p>
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
        <!-- <li class="active treeview"> -->

        <li class="<?php if($this->load->uri->segment('1')==null)
                            {echo "active treeview";}
                         else {echo "treeview";}?>">
          <a href="?page=dashboard" class="active">
            <i class="fa fa-dashboard" ></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?=base_url('')?>"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="<?=base_url('')?>"><i class="fa fa-circle-o"></i> Dhasboard v2 </a></li>
          </ul>
        </li>
        <li class="<?php if($this->load->uri->segment('2')=='load_pelanggan')
                            {echo "active treeview";}
                         elseif($this->load->uri->segment('2')=='load_transaksi')
                            {echo "active treeview";}
                         elseif($this->load->uri->segment('1')=='pulsaku')
                            {echo "active treeview";}
                            
                         else {echo "treeview";} ?>">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Daftar Transaksi</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('pelanggan/load_pelanggan')?>"><i class="fa fa-circle-o"></i> Data Pelanggan</a></li>
            <li><a href="<?=base_url('transaksi/load_transaksi')?>"><i class="fa fa-circle-o"></i> Daftar Transaksi</a></li>
            <li><a href="<?=base_url('produk/load_produk')?>"><i class="fa fa-circle-o"></i> Daftar Produk</a></li>
            
            <li><a href="<?=base_url('pulsaku')?>"><i class="fa fa-circle-o"></i> Contoh Dhasboard PulsaQu</a></li>
          </ul>
        </li>      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 