<?php
session_start();
require('./FPDF/fpdf.php');
require('./phpqrcode/qrlib.php');

$fecha = $_SESSION['dia'];
$cine = $_SESSION['cine'];
$hora =  $_SESSION['hora'];
$sala = $_SESSION['sala'];
$film = $_SESSION['flim'];
$butacas = $_SESSION['butacas'];

 
$pdf = new FPDF();
$pdf->AddPage();

// config document
$pdf->SetTitle('Entradas');
$pdf->SetAuthor('Kodetop');
$pdf->SetCreator('FPDF Maker');

// add title
$pdf->SetFont('Arial', 'B', 24);
$pdf->Cell(0, 10, $cine, 0, 1);
$pdf->Ln();

// add text
$aux= 1;
for($x=0; $x<count($butacas);$x++){

    $ruta = "./temp/qr".$x.".png";
    $tamano = 8;
    $level = "M";
    $frameSize =3;
    $contenido = "Fecha:" . $fecha . " Seción:". $hora . " Sala:".$sala . "Butaca:" . $butacas[$x];
    QRcode::png($contenido,$ruta,$level,$tamano,$frameSize);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 7, utf8_decode('Película: '.$film), 0, 1);
    $pdf->MultiCell(0, 7, utf8_decode('Fecha: '.$fecha.' sesión: '. $hora), 0, 1);
    $pdf->MultiCell(0, 7, utf8_decode('Sala: '.$sala), 0, 1);
    $pdf->MultiCell(0, 7, utf8_decode('butaca: '.$butacas[$x]), 0, 1);
    $pdf->Image($ruta,80,(35*$aux), 25, 25,'PNG');
    $pdf->MultiCell(0, 7, utf8_decode('---------------------------------------------------------------------'), 0, 1);
    $aux++;
}


// add image
//$pdf->Image('assets/fpdf-code.png', null, null, 180);

// output file
$pdf->Output('');