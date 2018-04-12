<?php $this->load->view('backend/template/css')?>
<?php $this->load->view('backend/template/header')?>
<?php $this->load->view('backend/template/menu')?>
<?php $this->load->view('backend/template/js')?>

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
          <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Pelanggan</button>
        </div>      
        <div class="box-body table-responsive">
          
          <table id="table" class="table table-hover " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Kode Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>No HP</th>
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
          "url": "<?php echo site_url('pelanggan/daftarpelanggan')?>",
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


    function add_person()
        {
          save_method = 'add';
          $('#form')[0].reset(); // reset form on modals
          $('#modal_form').modal('show'); // show bootstrap modal
          $('.modal-title').text('Tambah Data Pelanggan'); // Set Title to Bootstrap modal title
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
        url = "<?php echo site_url('pelanggan/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('pelanggan/ajax_update')?>";
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
          <h3 class="modal-title">Form Tambah Data Pelanggan</h3>
        </div>
        <div class="modal-body form">
          <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id"/> 
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-3">Kode Pelanggan</label>
                <div class="col-md-9">
                  <input name="firstName" placeholder="First Name" class="form-control" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Nama Pelanggan</label>
                <div class="col-md-9">
                  <input name="lastName" placeholder="Last Name" class="form-control" type="text">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3">Nomor HP</label>
                <div class="col-md-9">
                  <textarea name="address" placeholder="Address"class="form-control"></textarea>
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