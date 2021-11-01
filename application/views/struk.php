<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print Nota</title>
	<style>

		html { font-family: "Verdana, Arial"; }

		.content {
			width: 80mm;
			font-size: 12px;
			padding: 5px;
		}

		.title {
			text-align: center;
			font-size: 13px;
			padding-bottom: 5px;
			border-bottom: 1px dashed;
		}

		.head {
			margin-top: 5px;
			margin-bottom: 10px;
			padding-bottom: 10px;
			border-bottom: 1px solid;
		}

		table {
			width: 100%;
			font-size: 12px;
		}

		.thanks {
			margin-top: 10px;
			padding-top: 10px;
			text-align: center;
			border-top: 1px dashed;
		}

		@media print {
			@page {
				width: 80mm;
				margin: 0mm;
			}
		}
	
	</style>
</head>
<body onload="window.print()">

	<div class="content">
		<div class="title">
			<b>AnP-Store</b>
			<br>
			Jl. Ciseeng Raya No.11A Bogor
		</div>
		
		<!-- Head Struk -->
		<div class="head">
			<table cellspacing="0" cellpadding="0">
				<tr>
					<td style="width: 200px">
						<?php  
							echo date('d/m/Y',strtotime($sale->date))." ". date("H:i", strtotime($sale->created_sale));
						?>
					</td>

					<td>Cashier</td>
					<td style="text-align: center; width: 10px">:</td>
					<td style="text-align: right;">
						<?php echo ucfirst($sale->nama_user) ?>
					</td>
				</tr>

				<tr>
					<td>
						<?php echo $sale->invoice; ?>
					</td>
					<td>Customer</td>
					<td style="text-align: center;">:</td>
					<td style="text-align: right;">
						<?php echo $sale->id_customer == 0 ? 'umum' : $sale->nama_customer ?>
					</td>
				</tr>

			</table>
		</div>
		<!-- / Head Struk -->

		<!-- Transaksi Struk -->
		<div class="transaction">
				
			<table class="transaction-table" cellspacing="0" cellpadding="0">
				<?php  
					$arr_discount = array();
					foreach($sale_detail as $key => $value){
				?>

				<tr>
					<td style="width: 165px"><?php echo $value->nama_barang ?></td>
					<td><?php echo $value->qty ?></td>
					<td style="text-align: right; width: 60px;"><?php echo $value->harga ?></td>
					<td style="text-align: right; width: 60px;">
						<?php echo ($value->harga - $value->discount_item) * $value->qty ?>
					</td>
				</tr>

				<?php   
						if($value->discount_item > 0){
							$arr_discount[] = $value->discount_item;
						}
					}

					foreach ($arr_discount as $key => $value){
				?>

					<tr>
						<td></td>
						<td colspan="2" style="text-align: right;">Disc. <?php echo ($key+1) ?></td>
						<td style="text-align: right;">
							<?php $value ?>
						</td>
					</tr>

					<?php } ?>


				<tr>
					<td colspan="4" style="border-bottom: 1px dashed; padding-top: 5px"></td>
				</tr>

				<tr>
					<td colspan="2"></td>
					<td style="text-align: right; padding-top: 5px">Sub Total</td>
					<td style="text-align: right; padding-top: 5px">
						<?php $sale->total_price; ?>
					</td>
				</tr>

				<?php if($sale->discount > 0){ ?>
					<tr>
						<td colspan="2"></td>
						<td style="text-align: right; padding-bottom: 5px">Disc. Sale</td>
						<td style="text-align: right; padding-bottom: 5px"><?php echo $sale->discount ?></td>
					</tr>
				<?php } ?>

				<tr>
					<td colspan="2"></td>
					<td style="border-top:1px dashed; text-align: right; padding: 5px 0">Cash</td>
					<td style="border-top:1px dashed; text-align: right; padding: 5px 0"><?php echo $sale->cash ?></td>
				</tr>

				<tr>
					<td colspan="2"></td>
					<td style="text-align: right;">Chang</td>
					<td style="text-align: right;"><?php echo $sale->remaining ?></td>
				</tr>

			</table>

		</div>
		<!-- / Transaksi Struk -->

		<!-- Thanks -->
		<div class="thanks">
			--- Thank You ---
			<br>
			www.AnP-store.com
		</div>
		<!-- / Thanks -->

	</div>
	
</body>
</html>