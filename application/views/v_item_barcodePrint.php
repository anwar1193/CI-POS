<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Barcode Print</title>
</head>
<body>
	<?php 
	    foreach($result as $row) :

	    $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
	    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row['barcode'], $generator::TYPE_CODE_128)) . '">';
	    echo '<br>';

	    echo $row['barcode'];
	    
	    endforeach;
	?>
</body>
</html>