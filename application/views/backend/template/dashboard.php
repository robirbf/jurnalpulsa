<?php $this->load->view('backend/template/css')?>
<?php $this->load->view('backend/template/header')?>
<?php $this->load->view('backend/template/menu')?>

      <div class="wrapper">
        <div class="content-wrapper">
          <section class="content-header">
            <h1>
              Server Bisa
              <small>Jurnal Pulsa</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </section> 

          <section class="content">
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>65</h3>

                    <p>PELANGGAN</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?=base_url('pelanggan/load_pelanggan')?>" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>Rp. 172.000</h3>

                    <p>PIUTANG</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

            </div> 
          </section>

        </div><!-- /.content-wrapper -->

<?php $this->load->view('backend/template/footer')?>
      </div><!-- ./wrapper -->
<?php $this->load->view('backend/template/js')?>

</body>
</html>