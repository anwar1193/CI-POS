  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stock Out
        <small>Stok Keluar</small>
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
      			<a href="<?php echo base_url().'index.php/stockOut/tambah_data' ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-user-plus"></i> Tambah Stock Out</a>
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
              <td><?php echo $row['nama_item'] ?></td>
              <td><?php echo $row['type'] ?></td>
              <td><?php echo $row['detail'] ?></td>
              <td><?php echo $row['nama_supplier'] ?></td>
              <td><?php echo $row['qty'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><?php echo $row['nama_user'] ?></td>
              <td>
                <a class="btn btn-default btn-sm" href=""><i class="fa fa-eye"></i> Detail</a>
                <a class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i> Hapus</a>
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
