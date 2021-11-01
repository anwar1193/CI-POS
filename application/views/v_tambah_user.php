  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah User
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
              
              <!-- Tampilkan Pesan Form Validation (Semua diatas) -->
              <?php //echo validation_errors(); ?>

              <form action="" method="post">
                
                <div class="form-group <?php echo form_error('nama_lengkap') ? 'has-error' : null ?>">
                  <label>Nama Lengkap *</label>
                  <input type="text" class="form-control" name="nama_lengkap" value="<?php echo set_value('nama_lengkap') ?>">
                  <?php echo form_error('nama_lengkap') ?>
                </div> 

                <div class="form-group <?php echo form_error('username') ? 'has-error' : null ?>">
                  <label>Usename *</label>
                  <input type="text" class="form-control" name="username" value="<?php echo set_value('username') ?>">
                  <?php echo form_error('username') ?>
                </div>

                <div class="form-group <?php echo form_error('password') ? 'has-error' : null ?>">
                  <label>Password *</label>
                  <input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>">
                  <?php echo form_error('password') ?>
                </div> 

                 <div class="form-group <?php echo form_error('pass_conf') ? 'has-error' : null ?>">
                  <label>Konfirmasi Password *</label>
                  <input type="password" class="form-control" name="pass_conf" value="<?php echo set_value('pass_conf') ?>">
                  <?php echo form_error('pass_conf') ?>
                </div> 

                <div class="form-group <?php echo form_error('level') ? 'has-error' : null ?>">
                  <label>Level</label>
                  <select name="level" class="form-control">
                    <option value="">- Pilih Level -</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                  </select>
                  <?php echo form_error('level') ?>
                </div>

                <button class="btn btn-success" type="submit">Simpan Data</button>  
                <a href="<?php echo base_url().'index.php/user/index' ?>" class="btn btn-warning">Kembali</a>  

              </form>

            </div>  
          </div>
      	</div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
