<?php

Class Lib_dompdf{

	function pdfGenerator($html,$filename,$paper,$orientation){

		// instantiate and use the dompdf class
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper($paper, $orientation);

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream($filename, array('Attachment' => 0)); //'Attachment' => 0 , itu supaya preview dulu (tidak langsung download)

	}

} 