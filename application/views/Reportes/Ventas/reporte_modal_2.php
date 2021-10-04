<?php
//require('fpdf/fpdf.php');
//require('model.php');
//$nw = new Northwind();
//$id = 42;
class pdf extends FPDF {
	public function header()
	{
		$this->SetFillColor(253, 135,39);
		$this->Rect(0,0, 220, 50, 'F');
		$this->SetY(25);
		$this->SetFont('Arial', 'B', 30);
		$this->SetTextColor(255,255,255);
		$this->Write(5, 'CodeStack');

	}

	public function footer()
	{
		$this->SetFillColor(253, 135,39);
		$this->Rect(0, 250, 220, 50, 'F');
		$this->SetY(-20);
		$this->SetFont('Arial', '', 12);
		$this->SetTextColor(255,255,255);
		$this->SetX(120);
		$this->Write(5, 'CodeStack');
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, 'jose.jairo.fuentes@gmail.com');
		$this->SetX(120);
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, '+(503)7889-8787');
	}
}

$this->fpdf = new PDF('P', 'mm', 'letter', true); //Le paso true para que decodifique segun el metodo constructor del archivo fpdf.php
$this->fpdf->AddPage('portrait', 'letter');
$this->fpdf->SetMargins(10, 25, 20, 20);


//function Ymd_dmY(string $fecha, string $separador = "/"):string
//{
//	$ano=substr($fecha,0,4);
//	$mes=substr($fecha, 5,2);
//	$dia=substr($fecha, 8,2);
//
//	$_fecha=$dia.$separador.$mes.$separador.$ano;
//	return $_fecha;
//}

//function SetCurrency(float $valor, string $signo = '$'):string
//{
//	return $signo.number_format($valor,2,'.','');
//}

$this->fpdf = new pdf('P','mm','letter',true);
$this->fpdf->AddPage('portrait', 'letter');
$this->fpdf->SetMargins(10,30,20,20);
$this->fpdf->SetFont('Arial', '', 9);
$this->fpdf->SetTextColor(255,255,255);
//$order = $nw->getOrder($id);
//$customer = $nw->getCustomer($order->customer_id);
//$order_details = $nw->getOrderDetails($order->id);

$this->fpdf->SetY(15);
$this->fpdf->SetX(120);
$this->fpdf->Write(5, 'DETALLES DEL ENVÍO ');
$this->fpdf->Ln();
$this->fpdf->SetX(120);
//$this->fpdf->Write(5, 'Fecha de la orden: '.Ymd_dmY($order->order_date));
$this->fpdf->Ln();
$this->fpdf->SetX(120);
//$this->fpdf->Write(5, 'Fecha de envío: '.Ymd_dmY($order->shipped_date));
$this->fpdf->Ln();
$this->fpdf->SetX(120);
//$this->fpdf->Write(5, 'Dirección: '.$order->ship_address);
$this->fpdf->Ln();
$this->fpdf->SetX(120);
//$this->fpdf->Write(5, 'Ciudad: '.$order->ship_city);

$this->fpdf->SetTextColor(0,0,0);
//$this->fpdf->Image('img/2.png', 20, 55);

$this->fpdf->SetFont('Arial', 'B');
$this->fpdf->SetY(60);
$this->fpdf->SetX(120);
//$this->fpdf->Write(5, $customer->company);
$this->fpdf->SetFont('Arial', '');
$this->fpdf->Ln();
$this->fpdf->SetX(120);
//$this->fpdf->Write(5, $customer->last_name.', '.$customer->first_name);
$this->fpdf->Ln();
$this->fpdf->SetX(120);
//$this->fpdf->Write(5, $customer->job_title);
$this->fpdf->Ln();
$this->fpdf->SetX(120);
//$this->fpdf->Write(5, $customer->business_phone);
$this->fpdf->Ln();
$this->fpdf->SetX(120);
//$this->fpdf->Write(5, $customer->address);

$this->fpdf->SetY(100);
$this->fpdf->SetTextColor(255,255,255);
$this->fpdf->SetFillColor(79,78,77);
$this->fpdf->Cell(60, 10, 'PRODUCTO', 0, 0, 'C', 1);
$this->fpdf->Cell(60, 10, 'DESCRIPCION', 0, 0, 'C', 1);
$this->fpdf->Cell(20, 10, 'P. UNITARIO', 0, 0, 'C', 1);
$this->fpdf->Cell(20, 10, 'CANTIDAD', 0, 0, 'C', 1);
$this->fpdf->Cell(30, 10, 'SUBTOTAL', 0, 0, 'C', 1);
$this->fpdf->Ln();

$this->fpdf->SetLineWidth(0.5);
$this->fpdf->SetTextColor(0,0,0);
$this->fpdf->SetFillColor(255,255,255);
$this->fpdf->SetDrawColor(80,80,80);
//$total = 0;
//foreach($order_details as $detail)
//{
//	$this->fpdf->Cell(60, 10, $detail->product_name, 'B', 0, 'C', 1);
//	$this->fpdf->Cell(60, 10, $detail->description, 'B', 0, 'C', 1);
//	$this->fpdf->Cell(20, 10, SetCurrency(doubleval($detail->unit_price)), 'B', 0, 'C', 1);
//	$this->fpdf->Cell(20, 10, doubleval($detail->quantity), 'B', 0, 'C', 1);
//	$this->fpdf->Cell(30, 10, SetCurrency($detail->unit_price * $detail->quantity), 'B', 0, 'C', 1);
//	$this->fpdf->Ln();
//	$total += $detail->unit_price * $detail->quantity;
//}
//$iva = $total * 0.13;

$this->fpdf->SetFontSize(12);
$this->fpdf->Cell(120, 10, 'Observaciones', 0, 0);
$this->fpdf->Cell(20, 10, 'Subtotal', 0, 0,'C');
$this->fpdf->Cell(20, 10, '', 0, 'C');
//$this->fpdf->Cell(30, 10, SetCurrency($total), 0, 0, 'C');

$this->fpdf->Ln();
$this->fpdf->Cell(120, 10, '', 0, 0);
$this->fpdf->Cell(20, 10, 'IVA', 0, 0,'C');
$this->fpdf->Cell(20, 10, '', 0, 0,'C');
//$this->fpdf->Cell(30, 10, SetCurrency($iva), 0, 0, 'C');

$this->fpdf->Ln();
$this->fpdf->SetTextColor(255,255,255);
$this->fpdf->SetFillColor(79,78,77);
$this->fpdf->Cell(120, 10, '', 0, 0,'C', 1);
$this->fpdf->Cell(20, 10, 'Total', 0, 0,'C', 1);
$this->fpdf->Cell(20, 10, '', 0, 0,'C',1);
//$this->fpdf->Cell(30, 10, SetCurrency($iva + $total), 0, 0, 'C', 1);

$this->fpdf->OutPut();

?>