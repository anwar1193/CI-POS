  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Stock In
        <small>Stok Masuk</small>
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
                <form method="post" action="<?php echo base_url().'index.php/stockIn/simpan_data' ?>">
                  
                  <div class="form-group">
                    <label for="date">Date *</label>
                    <input type="date" name="date" id="date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                  </div>
                  
                  <div>
                    <label for="barcode">Barcode *</label>
                  </div>
                  <div class="form-group input-group">
                    <input type="text" name="id_item" id="id_item" required hidden>
                    <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-item">
                        <i class="fa fa-search"></i>
                      </button>
                    </span>
                  </div>

                  <div class="form-group">
                    <label for="nama_item">Nama Item *</label>
                    <input type="text" class="form-control" name="nama_item" id="nama_barang" readonly>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-8">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" class="form-control" id="unit" readonly="">
                      </div>

                      <div class="col-md-4">
                        <label for="stok">Stok</label>
                        <input type="text" name="stok" class="form-control" id="stok" readonly="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="detail">Detail</label>
                    <input type="text" name="detail" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <select name="supplier" class="form-control">
                      <option value="">-Pilih Supplier-</option>
                      <?php foreach($result_supl as $row_supl) : ?>
                      <option value="<?php echo $row_supl['id'] ?>"><?php echo $row_supl['nama'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="qty">Qty (Jumlah Masuk) *</label>
                    <input type="number" name="qty" class="form-control" required>
                  </div>

                  <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                  <a href="<?php echo base_url().'index.php/stockIn/index' ?>" class="btn btn-danger"><i class="fa fa-refresh"></i> Batal</a>

                </form>
              </div>
            </div>  
          
      	</div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal Barcode -->
<div class="modal fade" id="modal-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pilih Item</h4>
      </div>

      <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped" id="tableDT">
          <thead>
            <tr>
              <th>NO</th>
              <th>Barcode</th>
              <th>Nama</th>
              <th>Unit</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

          <?php 
            $no=1;
            foreach($result_item as $row_item) : 
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row_item['barcode'] ?></td>
              <td><?php echo $row_item['nama_barang'] ?></td>
              <td><?php echo $row_item['nama_unit'] ?></td>
              <td><?php echo number_format($row_item['harga']) ?></td>
              <td><?php echo $row_item['stok'] ?></td>
              <td>
                <button class="btn btn-info btn-xs" id="select" 
                  data-barcode="<?php echo $row_item['barcode'] ?>"
                  data-id_item="<?php echo $row_item['id'] ?>"
                  data-nama="<?php echo $row_item['nama_barang'] ?>"
                  data-unit="<?php echo $row_item['nama_unit'] ?>"
                  data-stok="<?php echo $row_item['stok'] ?>"
                  >
                  <i class="fa fa-check"></i> Pilih Item
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
</div>
<!-- Penutup Model Barcode -->

<!-- JQUERY TAMPIl DATA DARI BARCODE -->

<script>
  $(document).ready(function(){

    $(document).on('click', '#select', function(){

      var id_item = $(this).data('id_item');
      var barcode = $(this).data('barcode');
      var nama_barang = $(this).data('nama');
      var unit = $(this).data('unit');
      var stok = $(this).data('stok');

      $('#barcode').val(barcode);
      $('#id_item').val(id_item);
      $('#nama_barang').val(nama_barang);
      $('#unit').val(unit);
      $('#stok').val(stok);

      $('#modal-item').modal('hide');


    });

  });
</script>

<!-- Kalo gak jalan, tambah juga file jquery di atas (header) -->