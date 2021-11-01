  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Item
        <small>Produk Tersedia</small>
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
              
              <?php echo form_open_multipart() ?>
                
                <div class="form-group <?php echo form_error('barcode') ? 'has-error' : null ?>">
                  <label>Barcode *</label>
                  <input type="text" class="form-control" name="barcode">
                  <?php echo form_error('barcode') ?>
                </div>

                <div class="form-group <?php echo form_error('nama_barang') ? 'has-error' : null ?>">
                  <label>Nama Barang *</label>
                  <input type="text" class="form-control" name="nama_barang">
                  <?php echo form_error('nama_barang') ?>
                </div>

                <div class="form-group <?php echo form_error('kategori') ? 'has-error' : null ?>">
                  <label>Kategori *</label>
                  <select name="kategori" class="form-control">
                    <option value="">-Pilih Kategori-</option>
                    <?php foreach($res_kategori as $row_kategori) : ?>
                    <option value="<?php echo $row_kategori['id'] ?>"><?php echo $row_kategori['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('kategori') ?>
                </div>

                <div class="form-group <?php echo form_error('unit') ? 'has-error' : null ?>">
                  <label>Unit *</label>
                  <select name="unit" class="form-control">
                    <option value="">-Pilih Unit-</option>
                    <?php foreach($res_unit as $row_unit) : ?>
                    <option value="<?php echo $row_unit['id'] ?>"><?php echo $row_unit['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('unit') ?>
                </div>

                <div class="form-group <?php echo form_error('harga') ? 'has-error' : null ?>">
                  <label>Harga *</label>
                  <input type="number" class="form-control" name="harga">
                  <?php echo form_error('harga') ?>
                </div>

                <div class="form-group <?php echo form_error('stok') ? 'has-error' : null ?>">
                  <label>Stok *</label>
                  <input type="number" class="form-control" name="stok">
                  <?php echo form_error('stok') ?>
                </div>

                <div class="form-group">
                  <label>Gambar *</label>
                  <input type="file" class="form-control" name="gambar">
                </div>

                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo base_url().'index.php/item/index' ?>" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> Batal</a>

              <?php echo form_close(); ?>

            </div>  
          </div>
      	</div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
