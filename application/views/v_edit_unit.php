  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Unit
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
              
              <?php foreach($result as $row) : ?>
              <form method="post">
                
                <div class="form-group <?php echo form_error('nama') ? 'has-error' : null ?>">
                  <label>Nama *</label>
                  <input class="form-control" type="text" name="nama" value="<?php echo $row['nama']; ?>"></input>
                  <?php echo form_error('nama'); ?>
                </div>

                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Update</button>
                <a class="btn btn-danger btn-sm" href="<?php echo base_url().'index.php/unit/index' ?>"><i class="fa fa-refresh"></i> Batal</a>

              </form>
              <?php endforeach; ?>

            </div>  
          </div>
      	</div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
