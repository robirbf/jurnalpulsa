    <!-- <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script> -->


    



<?php $this->load->view('backend/template/css')?>
<?php $this->load->view('backend/template/header')?>
<?php $this->load->view('backend/template/menu')?>
<?php $this->load->view('backend/template/js')?>
<?php $this->load->view('backend/template/sweetalert')?>



<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Pelanggan
        <small>Contoh Data Tabel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header">
        <button class="btn btn-success" onclick="add_produk()"><i class="glyphicon glyphicon-plus"></i> Tambah Produk</button>
        </div>

        <div class="box-body table-responsive">
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Server</th>
                    <th>Harga Jual</th>
                    <th style="width:189px;">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>                
            </table>
        </div> <!-- table responsiv-->
            </div>
        </div>    
    </section>

  </div>


  <script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('produk/ajax_list')?>",
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

    function add_produk()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Produk'); // Set Title to Bootstrap modal title
    }

    function edit_produk(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('produk/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
         
          $('[name="id"]').val(data.id);
          $('[name="kd_produk"]').val(data.kd_produk);
          $('[name="nm_prdk"]').val(data.nm_prdk);
          $('[name="hrg_server"]').val(data.hrg_server);
          $('[name="hrg_jual"]').val(data.hrg_jual);
          
          
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Produk'); // Set title to Bootstrap modal title
            
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    function save()
    {
      var url;
      if(save_method == 'add') 
      {
        url = "<?php echo site_url('produk/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('produk/ajax_update')?>";
      }

       // ajax adding data to database
       $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
               swal(
                'Good job!',
                'Data has been save!',
                'success'
                )
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding / update data');
            }
          });
     }

     function delete_produk(id)
     {

      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false
      }).then(function(isConfirm) {
        if (isConfirm) {

     // ajax delete data to database
     $.ajax({
      url : "<?php echo site_url('produk/ajax_delete')?>/"+id,
      type: "POST",
      dataType: "JSON",
      success: function(data)
      {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
               swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                );
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding / update data');
            }
          });

     
   }
 })
      
    }

    function view_produk(id)
{
          $.ajax({
            url : "<?php echo site_url('produk/list_by_id')?>/" + id,
            type: "GET",
            success: function(result)
            {
                $('#haha').empty().html(result).fadeIn('slow');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            }
        });
      }


     
  </script>


</div><!-- /.content -->   
<?php $this->load->view('backend/template/footer')?>
</div><!-- ./wrapper -->

   <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Produk Form</h3>
        </div>
        <div class="modal-body form">
          <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id"/> 
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-3">Kode Produk</label>
                <div class="col-md-9">
                  <input name="kd_produk" placeholder="Kode Produk" class="form-control" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Nama Produk</label>
                <div class="col-md-9">
                  <input name="nm_prdk" placeholder="Nama Produk" class="form-control" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Harga Server</label>
                <div class="col-md-9">
                  <input name="hrg_server" placeholder="Harga Server" class="form-control">  </input>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Harga Jual</label>
                <div class="col-md-9">
                  <input name="hrg_jual" placeholder="hrg_jual"class="form-control"></input>
                </div>
              </div>
              
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- End Bootstrap modal -->


</body>
</html>