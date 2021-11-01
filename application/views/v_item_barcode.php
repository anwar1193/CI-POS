  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barcode Item
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
      		<?php 
            foreach($result as $row) :

              $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
              echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row['barcode'], $generator::TYPE_CODE_128)) . '">';
              echo '<br>';

              echo $row['barcode'];
            
          ?>
          
          <br><br>
          <a href="<?php echo base_url().'index.php/item/barcode_print/'.$row['id'] ?>" target="_blank" class="btn btn-warning btn-xs"><i class="fa fa-print"></i> Print</a>

          <?php endforeach; ?>
      	</div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
