<?php $this->load->view('backend/template/css')?>
<?php $this->load->view('backend/template/header')?>
<?php $this->load->view('backend/template/menu')?>
<?php $this->load->view('backend/template/js')?>
 
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
        <div class="box">
          <div class="box-header">
              <h3 class="box-title">Daftar Transaksi Pulsa</h3>            
          </div>
          <div class="box-body table-responsive ">
              <table id="table" class="table table-hover  " cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>trxid</th>
                    <th>kode</th>
                    <th>Tujuan</th>
                    <th>status</th>
                    <th>harga</th>
                    <th>sn</th>
                    <th>pengirim</th>
                    <th>via</th>
                    <!-- <th style="width:189px;">Action</th> -->
                  </tr>
                </thead>
                <tbody>            
                </tbody>          
              </table>
          </div>
        </div>
      </section>
      


      <script type="text/javascript">

        var save_method; //for save method string
        var table;
        $(document).ready(function() {
          table = $('#table').DataTable({ 
            
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            
            // Load data for the table's content from an Ajax source
            "ajax": {
              "url": "<?php echo site_url('transaksi/daftartransaksi')?>",
              "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            { 
              "targets": [ -1 ], //last column
              "orderable": false, //set not orderable
            },
            ],

          });
        });

          

        function reload_table()
        {
          table.ajax.reload(null,false); //reload datatable ajax 
        }
      </script>

      
        
       
  </div><!-- /.content -->   
      <?php $this->load->view('backend/template/footer')?>
</div><!-- ./wrapper -->
      
</body>
</html>