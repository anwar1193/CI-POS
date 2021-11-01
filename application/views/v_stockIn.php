  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stock In
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

      	<div class="box-header">
      		<div class="pull-right">
      			<a href="<?php echo base_url().'index.php/stockIn/tambah_data' ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-user-plus"></i> Tambah Stock In</a>
      		</div>
      	</div>

        <?php echo $this->session->flashdata('pesan_sukses'); ?>
      	<div class="box-body table-responsive">
      		<table class="table table-bordered table-striped" id="tableDT">
      			<thead>
      				<tr style="background-color: orange">
      					<th>NO</th>
      					<th>Item</th>
      					<th>Type</th>
      					<th>Detail</th>
                <th>Supplier</th>
                <th>Qty</th>
                <th>Date</th>
      					<th>User</th>
                <th>Action</th>
      				</tr>
      			</thead>

      			<tbody>
            <?php 
              $no=1;
              foreach($result as $row) : 
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_barang'] ?></td>
                <td><?php echo $row['type'] ?></td>
                <td><?php echo $row['detail'] ?></td>
                <td><?php echo $row['nama_supplier'] ?></td>
                <td><?php echo $row['qty'] ?></td>
                <td><?php echo indo_date($row['date']) ?></td>
                <td><?php echo $row['nama_user'] ?></td>
                <td>
                  <button class="btn btn-default btn-sm" id="select" data-toggle="modal" data-target="#modal-detail"
                    data-nama="<?php echo $row['nama_barang'] ?>"
                    data-type="<?php echo $row['type'] ?>"
                    data-detail="<?php echo $row['detail'] ?>"
                    data-supplier="<?php echo $row['nama_supplier'] ?>"
                    data-qty="<?php echo $row['qty'] ?>">
                    <i class="fa fa-eye"></i> Detail
                  </button>

                  <a href="<?php echo base_url().'index.php/stockIn/hapus_data/'.$row['id'].'/'.$row['id_item'].'/'.$row['qty'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i> Hapus</a>

                </td>
              </tr>
            <?php endforeach ?>
      			</tbody>
      		</table>
      	</div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


 <!-- Modal Barcode -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Stock In</h4>
      </div>

      <div class="modal-body table-responsive">
        <table class="table table-bordered">
          <tbody>

            <tr>
              <th>Nama Barang : </th>
              <td><span id="nama_barang"></span></td>
            </tr>

            <tr>
              <th>Type :</th>
              <td><span id="type"></span></td>
            </tr>

            <tr>
              <th>Detail :</th>
              <td><span id="detail"></span></td>
            </tr>

            <tr>
              <th>Supplier :</th>
              <td><span id="supplier"></span></td>
            </tr>

            <tr>
              <th>Qty :</th>
              <td><span id="qty"></span></td>
            </tr>

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

      var nama_barang = $(this).data('nama');
      var type = $(this).data('type');
      var detail = $(this).data('detail');
      var supplier = $(this).data('supplier');
      var qty = $(this).data('qty');

      $('#nama_barang').text(nama_barang);
      $('#type').text(type);
      $('#detail').text(detail);
      $('#supplier').text(supplier);
      $('#qty').text(qty);

      $('#modal-item').modal('hide');


    });

  });
</script>

<!-- Kalo gak jalan, tambah juga file jquery di atas (header) -->