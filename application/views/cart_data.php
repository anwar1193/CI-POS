<?php  
	$no = 1;
	if($cart->num_rows()>0){
		foreach($cart->result() as $c => $data){
?>

	<tr>
		<td><?php echo $no++ ?>.</td>
		<td><?php echo $data->barcode ?></td>
		<td><?php echo $data->nama ?></td>
		<td class="text-right"><?php echo $data->harga_barang ?></td>
		<td class="text-center"><?php echo $data->qty ?></td>
		<td class="text-right"><?php echo $data->discount ?></td>
		<td class="text-right" id="total"><?php echo $data->total ?></td>
		<td class="text-center">

			<button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
			data-cartid="<?php echo $data->id_cart ?>"
			data-barcode="<?php echo $data->barcode ?>"
			data-product="<?php echo $data->nama ?>"
			data-harga="<?php echo $data->harga_barang ?>"
			data-qty="<?php echo $data->qty ?>"
			data-discount="<?php echo $data->discount ?>"
			data-total="<?php echo $data->total ?>"
			class="btn btn-primary btn-xs"
			>
				<i class="fa fa-pencil"></i> Edit
			</button>

			<button id="del_cart" data-cartid="<?php echo $data->id_cart ?>" class="btn btn-danger btn-xs">
				<i class="fa fa-trash"></i> Delete
			</button>
		</td>
	</tr>

<?php  
		}
	}else{
		echo '
			<tr>
				<td colspan="8" class="text-center">Tidak Ada Item</td>
			</tr>
		';
	}
?>