  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Unit
        <small>Satuan Produk</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">

      	
      	<div class="box-body">
      		<div class="row">
            <div class="col-sm-4 col-sm-offset-4">
              
              <form method="post">
                
                <div class="form-group <?php echo form_error('nama') ? 'has-error' : null ?>">
                  <label>Nama *</label>
                  <input class="form-control" type="text" name="nama"></input>
                  <?php echo form_error('nama'); ?>
                </div>

                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Simpan</button>
                <a class="btn btn-danger btn-sm" href="<?php echo base_url().'index.php/unit/index' ?>"><i class="fa fa-refresh"></i> Batal</a>

              </form>

            </div>  
          </div>
      	</div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
