Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales
        <small>(Penjualan)</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
	<!-- / Content Header -->

	<!-- Konten Utama -->
	<section class="content">
		
		<!-- Baris Pertama -->
		<div class="row">
			
			<div class="col-md-4">
				<div class="box box-widget">
					<div class="box-body">

						<table width="100%">
							<tr>
								<td style="vertical-align: top">
									<label for="date">Date</label>
								</td>

								<td>
									<div class="form-group">
										<input type="text" id="date" class="form-control" value="<?php echo date('d-m-Y') ?>">
									</div>
								</td>
							</tr>

							<tr>
								<td style="vertical-align: top">
									<label for="kasir">Kasir</label>
								</td>

								<td>
									<div class="form-group">
										<input type="text" id="user" class="form-control" value="<?php echo $this->tampil_user->user_login()->nama_lengkap; ?>" readonly>
									</div>
								</td>
							</tr>

							<tr>
								<td style="vertical-align: top">
									<label for="Customer">Customer</label>
								</td>

								<td>
									<div>
										<select id="customer" class="form-control">
											<option value="Umum">Umum</option>

											<?php foreach($row_cust as $data_cust) : ?>
											<option value="<?php echo $data_cust['id'] ?>"><?php echo $data_cust['nama'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</td>
							</tr>

						</table>

					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box box-widget">
					<div class="box-body">
						<table width="100%">
							<tr>
								<td style="vertical-align: top; width: 30%">
									<label for="barcode">Barcode</label>
								</td>

								<td>
									<div class="form-group input-group">
										<input type="hidden" id="id_item">
										<input type="hidden" id="harga">
										<input type="hidden" id="stok">

										<input type="text" id="barcode" class="form-control" autofocus="">
										<span class="input-group-btn">
											<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
												<i class="fa fa-search"></i>
											</button>
										</span>
									</div>
								</td>
							</tr>

							<tr>
								<td style="vertical-align: top;">
									<label for="qty">QTY</label>
								</td>

								<td>
									<div class="form-group">
										<input type="number" id="qty" class="form-control" value="1" min="1">
									</div>
								</td>
							</tr>

							<tr>
								<td></td>
								<td>
									<div>
										<button class="btn btn-primary" type="button" id="add_cart">
											<i class="fa fa-cart-plus"></i> Add
										</button>
									</div>
								</td>
							</tr>

						</table>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box box-widget">
					<dix class="box-body">
						<div align="right" style="margin-right: 10px;">
							<h4>Invoice <b><span id="invoice"><?php echo $invoice; ?></span></b></h4>

							<h4><b><span id="grand_total2" style="font-size: 50pt">
								0
							</span></b></h4>
						</div>
					</dix>
				</div>
			</div>

		</div>
		<!-- / Baris Pertama -->

		<!-- Baris Kedua -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-widget">
					<div class="box-body table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Barcode</th>
									<th>Product Item</th>
									<th>Price</th>
									<th>Qty</th>
									<th width="10%">Discount Item</th>
									<th width="15%">Total</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>

							<tbody id="cart_table">
								
								<!-- sama dengan include di php biasa -->
								<?php $this->view('cart_data'); ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- / Baris Kedua -->

		<!-- Baris Ketiga -->
		<div class="row">
			<div class="col-md-3">
				<div class="box box-widget">
					<div class="box-body">
						<table width="100%">
							<tr>
								<td style="vertical-align: top; width: 30%">
									<label for="sub_total">Sub Total</label>
								</td>

								<td>
									<div class="form-group">
										<input type="number" id="sub_total" value="" class="form-control" readonly="">
									</div>
								</td>
							</tr>

							<tr>
								<td style="vertical-align: top;">
									<label for="discount">Discount</label>
								</td>

								<td>
									<div class="form-group">
										<input type="number" id="discount" value="0" min="0" class="form-control">
									</div>
								</td>
							</tr>

							<tr>
								<td style="vertical-align: top">
									<label for="grand_total">Grand Total</label>
								</td>

								<td>
									<div class="form-group">
										<input type="number" id="grand_total" class="form-control" readonly="">
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="box box-widget">
					<div class="box-body">
						<table width="100%">
							<tr>
								<td style="vertical-align: top; width: 30%; ?>">
									<label for="cash">Cash</label>
								</td>

								<td>
									<div class="form-group">
										<input type="number" id="cash" value="0" min="0" class="form-control">
									</div>
								</td>
							</tr>

							<tr>
								<td style="vertical-align: top;">
									<label for="change">Change</label>
								</td>

								<td>
									<div>
										<input type="number" id="change" class="form-control" readonly>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="box box-widget">
					<div class="box-body">
						<table width="100%">
							<tr>
								<td style="vertical-align: top;">
									<label for="note">Note</label>
								</td>

								<td>
									<div>
										<textarea id="note" rows="3" class="form-control"></textarea>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div>
					<button id="cancel_payment" class="btn btn-flat btn-warning">
						<i class="fa fa-refresh"></i> Cancel
					</button><br><br>

					<button id="process_payment" class="btn btn-flat btn-lg btn-success">
						<i class="fa fa-paper-plane-o"></i> Process Payment
					</button>
				</div>
			</div>

		</div>
		<!-- / Baris Ketiga -->

	</section>
	<!-- / Konten Utama -->

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
            foreach($rows_item as $row_item) : 
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
                  data-harga="<?php echo $row_item['harga'] ?>"
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
<!-- Penutup Modal Barcode -->


<!-- Modal Edit Cart Item -->
<div class="modal fade" id="modal-item-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Product Item</h4>
      </div>

      <div class="modal-body">
        
		<input type="hidden" id="cartid_item">

		<div class="form-group">
			<label for="product_item">Product Item</label>
			<div class="row">

				<div class="col-md-5">
					<input type="text" id="barcode_item" class="form-control" readonly>
				</div>

				<div class="col-md-7">
					<input type="text" id="product_item" class="form-control" readonly>
				</div>

			</div>
		</div>

		<div class="form-group">
			<label for="price_item">Price</label>
			<input type="number" id="price_item" min="0" class="form-control">
		</div>

		<div class="form-group">
			<label for="qty_item">Qty</label>
			<input type="number" id="qty_item" min="1" class="form-control">
		</div>

		<div class="form-group">
			<label for="total_before">Total Before Discount</label>
			<input type="number" id="total_before" class="form-control" readonly>
		</div>

		<div class="form-group">
			<label for="discount_item">Discount Per Item</label>
			<input type="number" id="discount_item" min="0" class="form-control">
		</div>

		<div class="form-group">
			<label for="total_item">Total After Discount</label>
			<input type="number" id="total_item" class="form-control" readonly>
		</div>

      </div>

      <div class="modal-footer">
      	<div class="pull-right">
      		<button type="button" id="edit_cart" class="btn btn-flat btn-success">
      			<i class="fa fa-paper-plane"></i> Save
      		</button>
      	</div>
      </div>
      
    </div>
  </div>
</div>
<!-- Penutup Modal Edit Cart Item -->


<!-- JQUERY TAMPIl DATA DARI BARCODE -->

<script>
  $(document).ready(function(){

  	// Ketika Tombol Select Modal Di Klik
    $(document).on('click', '#select', function(){

      var id_item = $(this).data('id_item');
      var barcode = $(this).data('barcode');
      var harga = $(this).data('harga');
      var stok = $(this).data('stok');

      $('#barcode').val(barcode);
      $('#id_item').val(id_item);
      $('#harga').val(harga);
      $('#stok').val(stok);

      $('#modal-item').modal('hide');

    });

    // Ketika Tombol Add Cart Di Klik
    $(document).on('click', '#add_cart', function(){
    	var id_item = $('#id_item').val(); //dari inputan hidden
    	var harga = $('#harga').val(); //dari inputan hidden
    	var stok = $('#stok').val(); //dari inputan hidden
    	var qty = $('#qty').val();

    	if(id_item == ''){
    		alert('Produk Belum Dipilih !');
    		$('#barcode').focus();
    	}else if(stok < 1){
    		alert('Stok Tidak Mencukupi');
    		$('#id_item').val('');
    		$('#barcode').val('');
    		$('#barcode').focus();
    	}else{
    		$.ajax({
    			type: 'POST',
    			url: '<?php echo base_url().'index.php/sales/proses' ?>',
    			data: {'add_cart' : true, 'id_item' : id_item, 'harga' : harga, 'qty' : qty},
    			dataType: 'json',
    			success: function(result){
    				if(result.success == true){
    					$('#cart_table').load('<?php echo base_url().'index.php/sales/cart_data' ?>', function(){
    						calculate();
    					});

    					$('#id_item').val('');
    					$('#barcode').val('');
    					$('#qty').val(1);
    					$('#barcode').focus();

    				}else{
    					alert('Gagal Ditambah ke Cart');
    				}
    			}
    		})
    	}
    });


    // Ketika Tombol del_cart di klik
    $(document).on('click', '#del_cart', function() {
    	if(confirm('Apakah Anda Yakin ?')){
    		var cart_id = $(this).data('cartid');
    		$.ajax({
    			type : 'POST',
    			url  : '<?php echo base_url().'index.php/sales/hapus_cart' ?>',
    			dataType : 'json',
    			data : {'cart_id' : cart_id},
    			success : function(result) {
    				if(result.success == true){
    					$('#cart_table').load('<?php echo base_url().'index.php/sales/cart_data' ?>', function(){
    						calculate();
    					});
    				}else{
    					alert('Gagal hapus item cart');
    				}
    			}
    		});
    	}
    });


    // Ketika tombol Edit di klik, masukkan data ke form yang ada di modal
    $(document).on('click', '#update_cart', function(){

    	//ambil data dari tombol update_cart (di cart_data.php)
    	var cartid_item = $(this).data('cartid');
    	var barcode_item = $(this).data('barcode');
    	var product_item = $(this).data('product');
    	var price_item = $(this).data('harga');
    	var qty_item = $(this).data('qty');
    	var total_before = $(this).data('harga') * $(this).data('qty');
    	var discount_item = $(this).data('discount');
    	var total_item = $(this).data('total');

    	$('#cartid_item').val(cartid_item);
    	$('#barcode_item').val(barcode_item);
    	$('#product_item').val(product_item);
    	$('#price_item').val(price_item);
    	$('#qty_item').val(qty_item);
    	$('#total_before').val(total_before);
    	$('#discount_item').val(discount_item);
    	$('#total_item').val(total_item);

    });


    // fungsi ubah data (realtime) di form edit
    function count_edit_modal(){
    	var price = $('#price_item').val();
    	var qty = $('#qty_item').val();
    	var discount = $('#discount_item').val();

    	total_before = price * qty;
    	$('#total_before').val(total_before);

    	total = (price - discount) * qty;
    	$('#total_item').val(total);

    	// Discount item tidak boleh kosong, jika kosong otomatis jadi 0
    	if(discount == ''){
    		$('#discount_item').val(0);
    	}
    }

    // Panggil fungsi ubah data (realtime) saat form (price_item, qty_item, discount_item) di ketik / di klik
    $(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function(){
    	count_edit_modal();
    });


    //Ketika tombol save (Update cart di Klik)
    $(document).on('click', '#edit_cart', function(){
    	var cart_id = $('#cartid_item').val();
    	var harga = $('#price_item').val();
    	var qty = $('#qty_item').val();
    	var discount = $('#discount_item').val();
    	var total = $('#total_item').val();

    	if(harga == '' || harga < 1){
    		alert('Harga Tidak Boleh Kosong !');
    		$('#price_item').focus();
    	}else if(qty < 1 || qty == ''){
    		alert('Qty Tidak Boleh Kosong');
    		$('#qty_item').focus();
    	}else{
    		$.ajax({
    			type: 'POST',
    			url: '<?php echo base_url().'index.php/sales/proses' ?>',
    			data: {'edit_cart' : true, 'id_cart' : cart_id, 'harga' : harga, 'qty' : qty, 'discount' : discount, 'total' : total},
    			dataType: 'json',
    			success: function(result){
    				if(result.success == true){
    					$('#cart_table').load('<?php echo base_url().'index.php/sales/cart_data' ?>', function(){
    						calculate();
    					});

    					$('#modal-item-edit').modal('hide');

    				}else{
    					alert('Tidak Ada Data yang Diupdate');
    				}
    			}
    		})
    	}
    });


    // Fungsi Hitung Subtotal, Total dan Kembalian
    function calculate(){
    	var subtotal = 0;

    	// seleksi setiap tr di tabel yg id nya "cart_table"
    	$('#cart_table tr').each(function() {
    		// jumlahkan data di kolom (td) yg id nya "total"
    		subtotal += parseInt($(this).find('#total').text());
    	});

    	// Tampilkan Subtotal
    	isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal); //jika bukan angka, maka inputan yg id nya sub_total set nilainya 0, jika angka nilainya = subtotal

    	var discount = $('#discount').val();
    	var grand_total = subtotal - discount;

    	//Tampilkan Grand Total
    	if(isNaN(grand_total)){ //jika bukan angka
    		$('#grand_total').val(0); // grand total yang kecil (pojok kiri bawah)
    		$('#grand_total2').text(0); // grand total yang besar (pojok kanan atas)
    	}else{ //jika angka
    		$('#grand_total').val(grand_total);
    		$('#grand_total2').text(grand_total);
    	}

    	// discount tidak bisa kosong, kalo kosong = 0
    	if(discount == ''){
    		$('#discount').val(0);
    	}

    	// Tampilkan Kembalian
    	var cash = $('#cash').val();
    	cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0); //Jika cash bukan 0, maka kembalian = cash-grand_total, kalo cash 0, maka kembalian 0
    }


    // Panggil fungsi calculate saat #discount atau #cash di klik atau di ketik
    $(document).on('keyup mouseup', '#discount, #cash', function(){
    	calculate();
    });

    // Panggil fungsi calculate saat load halaman
    $(document).ready(function(){
    	calculate();
    });

    // NB : fungsi calculate juga dipanggil saat sudah melakukan proses cart(tambah, edit, atau hapus)


    // Ketika Tombol Process Payment di klik
    $(document).on('click', '#process_payment', function(){
    	var customer_id = $('#customer').val();
    	var subtotal = $('#sub_total').val();
    	var discount = $('#discount').val();
    	var grandtotal = $('#grand_total').val();
    	var cash = $('#cash').val();
    	var change = $('#change').val();
    	var note = $('#note').val();
    	var date = $('#date').val();

    	if(subtotal < 1){
    		alert('Belum Ada Product yang Dipilih !');
    		$('#barcode').focus();
    	}else if(cash < 1){
    		alert('Jumlah Uang Cash Belum Diinput');
    		$('#cash').focus();
    	}else{
    		if(confirm('Yakin Proses Transaksi Ini?')){
    			$.ajax({
    				type : 'POST',
    				url : '<?php echo base_url().'index.php/sales/proses' ?>',
    				data : {'process_payment' : true, 'customer_id' : customer_id,   'subtotal' : subtotal, 'discount' : discount, 'grandtotal' : grandtotal, 'cash' : cash, 'change' : change, 'note' : note, 'date' : date
    				},
    				dataType : 'json',
    				success : function(result){
    					if(result.success){
    						alert('Transaksi Berhasil');
    						window.open('<?php echo base_url().'index.php/sales/cetak/' ?>' + result.sale_id, '_blank');
    					}else{
    						alert('Transaksi Gagal');
    					}
    					location.href='<?php echo base_url().'index.php/sales' ?>';
    				}
    			})
    		}
    	}

    });


    // Ketika Cancel (Payment) di Klik
    $(document).on('click', '#cancel_payment', function(){
    	if(confirm('Apakah Anda Yakin?')){
    		$.ajax({
    			type : 'POST',
    			url : '<?php echo base_url().'index.php/sales/hapus_cart' ?>',
    			dataType : 'json',
    			data : {'cancel_payment' : true},
    			success : function(result){
    				if(result.success == true){
    					$('#cart_table').load('<?php echo base_url().'index.php/sales/cart_data' ?>', function(){
    						calculate();
    					});
    				}
    			}
    		});

    		$('#discount').val(0);
    		$('#cash').val(0);
    		$('#customer').val(0);
    		$('#barcode').val(0);
    		$('#barcode').focus();
    	}
    });


  });
</script>

<!-- Kalo gak jalan, tambah juga file jquery di atas (header) -->