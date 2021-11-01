  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Customer
        <small>Pelanggan</small>
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
              
              <form action="" method="post">
                
                <div class="form-group <?php echo form_error('nama') ? 'has-error' : null ?>">
                  <label>Nama *</label>
                  <input type="text" class="form-control" name="nama">
                  <?php echo form_error('nama'); ?>
                </div>

                <div class="form-group <?php echo form_error('jenis_kelamin') ? 'has-error' : null ?>">
                  <label>Jenis Kelamin *</label>
                  <select name="jenis_kelamin" class="form-control">
                    <option value="">-Pilih-</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  <?php echo form_error('jenis_kelamin'); ?>
                </div>

                <div class="form-group <?php echo form_error('telepon') ? 'has-error' : null ?>">
                  <label>Telepon *</label>
                  <input type="number" class="form-control" name="telepon">
                  <?php echo form_error('telepon'); ?>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" rows="8" class="form-control"></textarea>
                </div>

                <button class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo base_url().'index.php/customer/index' ?>" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> Batal</a>

              </form>

            </div>  
          </div>
      	</div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
