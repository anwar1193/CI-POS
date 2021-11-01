  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Item
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

      	<div class="box-header">
      		<div class="pull-right">
      			<a href="<?php echo base_url().'index.php/item/tambah_data' ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-user-plus"></i> Tambah Item</a>
      		</div>
      	</div>

        <?php echo $this->session->flashdata('pesan_sukses'); ?>
      	<div class="box-body table-responsive">
      		<table class="table table-bordered table-striped" id="tableDT">
      			<thead>
      				<tr style="background-color: orange">
      					<th>NO</th>
      					<th>Barcode</th>
      					<th>Nama Barang</th>
      					<th>Kategori</th>
                <th>Unit</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
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
                <td>
                  <?php echo $row['barcode'] ?><br>
                  <a href="<?php echo base_url().'index.php/item/barcode/'.$row['id'] ?>" class="btn btn-warning btn-xs"><i class="fa fa-barcode"></i> Barcode</a>
                </td>
                <td><?php echo $row['nama_barang'] ?></td>
                <td><?php echo $row['nama_kategori'] ?></td>
                <td><?php echo $row['nama_unit'] ?></td>
                <td><?php echo rupiah($row['harga']) ?></td>
                <td><?php echo $row['stok'] ?></td>
                <td>
                  <img src="<?php echo base_url().'uploads/product/'.$row['gambar']?>" style="width: 100px" alt="">
                </td>
                <td>
                  <a href="<?php echo base_url().'index.php/item/edit_data/'.$row['id']?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                  <a href="<?php echo base_url().'index.php/item/hapus_data/'.$row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
      			</tbody>
      		</table>
      	</div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
