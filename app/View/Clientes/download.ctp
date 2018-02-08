<?php 
	App::import('Vendor','XTCPDF');  
	$tcpdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
	
	$tcpdf->SetAuthor("ACRCartera"); 
	//set auto page breaks
	$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	
	$tcpdf->SetMargins(PDF_MARGIN_LEFT, 50, PDF_MARGIN_RIGHT);
	$tcpdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	//$tcpdf->SetHeaderData(PDF_HEADER_LOGO, 100, '', '');
	
	// add a page (required with recent versions of tcpdf) 
	$tcpdf->AddPage();
	
	// set header and footer fonts
	$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$tcpdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	
	// set default monospaced font
	$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	
	//set image scale factor
	$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	
	//$tcpdf->writeHTML($data, true);
	// output the HTML content
	$tcpdf->writeHTML($content, true, 0, true, true);
	
	// reset pointer to the last page
	$tcpdf->lastPage();
	
	// ... 
	// etc. 
	// see the TCPDF examples  
	
	echo $tcpdf->Output('Carta de aviso '.$cliente.'.pdf', 'D'); 
?>