<?php
class PDF extends FPDF { //

    public function header() {
        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(16, 87, 97); //COLORES RGB BUSCAR EN GOOGLE
        $this->Write(5, ('Lima - Perú'));
        $this->Image(base_url() . '/dist/img/logo_empresa.png', 170, 10, 30, 10, 'PNG', base_url() . 'Movimientos/Controller_ventas');
    }

    public function footer() {
        $this->SetFont('Arial', '', 10);
        $this->SetY(262);
        $this->SetTextColor(16, 87, 97); //COLORES RGB BUSCAR EN GOOGLE
        //$this->Write(5, '4 de marzo del 2020');
        $this->Write(5,date('d/m/Y'),0,1,'L');
        $this->SetX(191);
        $this->Write(5, $this->PageNo());
    }

}

$this->fpdf = new PDF('P', 'mm', 'letter', true); //Le paso true para que decodifique segun el metodo constructor del archivo fpdf.php
$this->fpdf->AddPage('portrait', 'letter');
$this->fpdf->SetMargins(10, 25, 20, 20);

$this->fpdf->setFont('Arial', '', 16); //SUBRAYADO
$this->fpdf->SetY(20);
$this->fpdf->SetTextColor(16, 87, 97); //COLORES RGB BUSCAR EN GOOGLE

//$this->fpdf->SetDrawColor(16, 87, 97);  //color de la linea
//$this->fpdf->SetLineWidth(0.5);  //ancho de la linea
//$this->fpdf->Line(72, 26, 133, 26); //posiciones de la linea x(75,26) y(140,26)

$this->fpdf->Cell(0, 5, 'REPORTE DE VENTAS', 0, 0, 'C');
$this->fpdf->SetTextColor(0, 0, 0); //LE PONGO CERO PORQUE YA ES UNA SECCION DIFERENTE

$this->fpdf->Ln(); //SALTO DE LINEA

$this->fpdf->SetFont('Arial', '', 10);
$this->fpdf->setTextColor(16, 87, 97);
$this->fpdf->SetY(35);
$this->fpdf->SetX(10);
$this->fpdf->setTextColor(40, 40, 40);
$this->fpdf->Write(5, 'VENTA: '.$cabecera->cod_venta);
$this->fpdf->SetX(120);
$this->fpdf->Write(5, 'TIPO DE COMPROBANTE: '.$cabecera->ds_comprobante);
$this->fpdf->Ln();
$this->fpdf->SetX(10);
$this->fpdf->Write(5, 'CLIENTE: '.$cabecera->ds_cliente);
$this->fpdf->SetX(120);
$this->fpdf->Write(5, 'FECHA DE VENTA: '.$cabecera->fecha);
$this->fpdf->Ln();
$this->fpdf->SetX(10);
$this->fpdf->Write(5, 'DIRECCIÓN: '.$cabecera->direccion);
$this->fpdf->SetX(120);
$this->fpdf->Write(5, 'VENDEDOR: '.$cabecera->ds_vendedor);
$this->fpdf->Ln(10);


//$this->fpdf->setFont('Arial', '', 10);
//$this->fpdf->setTextColor(16, 87, 97);
//$this->fpdf->Cell(30, 5, 'VENTA');
//$this->fpdf->setFont('Arial', '',10);
//$this->fpdf->setTextColor(40, 40, 40);
//$this->fpdf->Cell(20, 5, ': ' . $cabecera->cod_venta);
//$this->fpdf->Ln(); //SALTO DE LINEA
//
//$this->fpdf->setFont('Arial', '', 10);
//$this->fpdf->setTextColor(16, 87, 97);
//$this->fpdf->Cell(30, 5, 'CLIENTE');
//$this->fpdf->setFont('Arial', '',10);
//$this->fpdf->setTextColor(40, 40, 40);
//$this->fpdf->Cell(20, 5, ': ' . $cabecera->ds_cliente);
//$this->fpdf->Ln(); //SALTO DE LINEA
//
//
//$this->fpdf->setFont('Arial', '', 10);
//$this->fpdf->setTextColor(16, 87, 97);
//$this->fpdf->Cell(30, 5, 'DIRECCIÓN');
//$this->fpdf->setFont('Arial', '');
//$this->fpdf->setTextColor(40, 40, 40);
//$this->fpdf->Cell(20, 5, ': ' . $cabecera->direccion);
//$this->fpdf->Ln(); //SALTO DE LINEA


$this->fpdf->setFont('Arial', '',10); //Para poner negrita
$this->fpdf->setFillColor(255, 255, 255); //Para poner relleno
$this->fpdf->setTextColor(16, 87, 97); //Para poner color del texto
$this->fpdf->setDrawColor(112, 112, 111); //Color del borde, va de la mano que el relleno
$this->fpdf->Cell(20, 10, 'Nº', 0, 0, 'C', 1); //El 1 al final es los bordes y pueda estar de color
$this->fpdf->Cell(40, 10, 'PRODUCTO', 0, 0, 'C', 1);
$this->fpdf->Cell(50, 10, 'DESCRIPCION', 0, 0, 'C', 1);
$this->fpdf->Cell(20, 10, 'CANTIDAD', 0, 0, 'C', 1);
$this->fpdf->Cell(30, 10, 'PRECIO UNIT', 0, 0, 'C', 1);
$this->fpdf->Cell(30, 10, 'IMPORTE', 0, 0, 'C', 1);

$this->fpdf->SetDrawColor(112, 112, 111); //Color de la linea
$this->fpdf->SetLineWidth(1);
$this->fpdf->Line(10.5, 85, 199.5, 85);
$this->fpdf->setTextColor(0, 0, 0);


//print_r($detalle); 
//die();
//$this->fpdf->setFontSize(8); //Para reducir el tamaño de la cabecera de la tabla
$this->fpdf->setFont('Arial', '',9); //Para poner negrita
$this->fpdf->SetLineWidth(0.2);
$this->fpdf->setFillColor(240, 240, 240);
$this->fpdf->setTextColor(40, 40, 40);
$this->fpdf->SetDrawColor(255, 255, 255);
$this->fpdf->Ln(12); //Separa la cabecera de la tabla
foreach ($detalle as $grilla_detalle) {
    $this->fpdf->Cell(20, 10, $grilla_detalle->item, 1, 0, 'C', 1); //El 1 al final es los bordes y pueda estar de color
    $this->fpdf->Cell(40, 10, $grilla_detalle->ds_producto, 1, 0, 'C', 1);
    $this->fpdf->Cell(50, 10, $grilla_detalle->marca, 1, 0, 'C', 1);
    $this->fpdf->Cell(20, 10, $grilla_detalle->cantidad, 1, 0, 'C', 1);
    $this->fpdf->Cell(30, 10, $grilla_detalle->precio, 1, 0, 'C', 1);
    $this->fpdf->Cell(30, 10, $grilla_detalle->importe, 1, 0, 'C', 1);
    $this->fpdf->Ln(); //SALTO DE LINEA
}

$this->fpdf->setFont('Arial', '',9); //Para poner negrita
$this->fpdf->setTextColor(16, 87, 97); //Para poner color del texto
$this->fpdf->Cell(130, 10, '', 0, 0);
$this->fpdf->Cell(20, 10, 'SUB TOTAL', 0, 0,'C');
$this->fpdf->Cell(20, 10, '', 0, 'C');
$this->fpdf->setTextColor(40, 40, 40);
$this->fpdf->Cell(20, 10, $cabecera->subtotal, 0, 0, 'C');

$this->fpdf->Ln();
$this->fpdf->setTextColor(16, 87, 97); //Para poner color del texto
$this->fpdf->Cell(130, 10, '', 0, 0);
$this->fpdf->Cell(20, 10, 'IGV', 0, 0,'C');
$this->fpdf->Cell(20, 10, '', 0, 'C');
$this->fpdf->setTextColor(40, 40, 40);
$this->fpdf->Cell(20, 10, $cabecera->igv, 0, 0, 'C');

$this->fpdf->Ln();
$this->fpdf->setTextColor(16, 87, 97); //Para poner color del texto
$this->fpdf->Cell(130, 10, '', 0, 0);
$this->fpdf->Cell(20, 10, 'S/. TOTAL', 0, 0,'C', 1);
$this->fpdf->Cell(20, 10, '', 0, 0,'C',1);
$this->fpdf->setTextColor(40, 40, 40);
$this->fpdf->Cell(20, 10, $cabecera->monto_total, 0, 0, 'C', 1);

$this->fpdf->OutPut();
?>
