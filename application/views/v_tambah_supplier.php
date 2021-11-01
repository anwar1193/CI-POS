  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Supplier
        <small>Pemasok Barang</small>
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

      		<!-- Form Tambah Supplier -->

          
          <div class="row">
            <div class="col-sm-4 col-sm-offset-4">

              <form action="" method="post">
          
                <div class="form-group <?php echo form_error('nama') ? 'has-error' : null ?>">
                  <label>Nama *</label>
                  <input type="text" class="form-control" name="nama">
                  <?php echo form_error('nama'); ?>
                </div>

                <div class="form-group <?php echo form_error('telepon') ? 'has-error' : null ?>">
                  <label>No Telepon / HP *</label>
                  <input type="number" class="form-control" name="telepon">
                  <?php echo form_error('telepon'); ?>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" rows="4" class="form-control"></textarea>
                </div>

                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea name="deskripsi" rows="5" class="form-control"></textarea>
                </div>

                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo base_url().'index.php/supplier/index' ?>" class="btn btn-danger"><i class="fa fa-refresh"></i> Batal</a>

              </form>

            </div>
          </div>
          
      		
      	</div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
