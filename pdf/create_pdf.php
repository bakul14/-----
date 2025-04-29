<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
}
require('fpdf/fpdf.php');  
$pdf=new FPDF();   
define('FPDF_FONTPATH',"fpdf/font/");
$pdf->AddFont('gostb', '', 'gostb.php');   
$pdf->AddPage();   
$pdf->Image('mmap.png', 0, 0, 210, 297);
$pdf->SetFont('gostb', '', 10); 

	INCLUDE "../connect.php";
	
	$lastname = $_SESSION['user']['lastname'];



	$selec="SELECT * FROM operations";
					
	$sp = oci_parse($c , $selec); 
	oci_execute($sp , OCI_DEFAULT); 


	$j=0;
	$i=1;
	$pdf->Text(10, 67+round($j*7.4), $i);
	WHILE (oci_fetch($sp)) {
		$pdf->Text(10, 67+round($j*7.4), $i);
		$ope_id = oci_result($sp , "OP_ID");
		$text = oci_result($sp , "OP_NAME");
		$text = iconv('utf-8','cp1251',$text);
		$pdf->Text(27, 67+round($j*7.4), $text);

		$pdf->Text(137, 269.5, iconv('utf-8','cp1251',"Власов"));
		$pdf->Text(137, 264.5, iconv('utf-8','cp1251',$lastname));
		$pdf->Ln(); 
		$i++;
		$j++;
		IF ($j>26){
			$pdf->AddPage();  
			$pdf->Image('mmap.png', 0, 0, 210, 297);
		$j=0;
		}
						
	}

$pdf->Output();  
?>