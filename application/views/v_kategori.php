  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>Jenis Produk</small>
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
      			<a href="<?php echo base_url().'index.php/kategori/tambah_data' ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-user-plus"></i> Tambah Kategori</a>
      		</div>
      	</div>

        <?php echo $this->session->flashdata('pesan_sukses'); ?>
      	<div class="box-body table-responsive">
      		<table class="table table-bordered table-striped" id="tableDT">
      			<thead>
      				<tr style="background-color: orange">
      					<th>NO</th>
      					<th>Nama Kategori</th>
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
                <td><?php echo $row['nama']; ?></td>
                <td>
                  <a href="<?php echo base_url().'index.php/kategori/edit_data/'.$row['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                  <a href="<?php echo base_url().'index.php/kategori/hapus_data/'.$row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')"><i class="fa fa-trash"></i> Hapus</a>
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
