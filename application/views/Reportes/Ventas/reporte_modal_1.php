<?php

/*
  CLASE 1
  $this->fpdf = new FPDF();
  $this->fpdf->AddPage(); //Obligatorio sino no habre el PDF
  $this->fpdf->setFont('Arial','B',12); //Escoger la fuente: Tipo de letra, negrita, tamaño
  $this->fpdf->Cell(30,5,'Hola mundo'); //Ancho, alto, parrafo.
  $this->fpdf->AddPage(); //Si deseas agregar otra pagina
  $this->fpdf->Write(5,'Hola mundo otra vez');
  $this->fpdf->OutPut();
  //CLASE 2
  $this->fpdf = new FPDF();
  $this->fpdf->AddPage('lanscape','letter'); //recibe la orientacion[portrait,lanscape], tamaño [A3,A4, LETTER, LEGAL], orientacion
  $this->fpdf->OutPut();
  //CLASE 3
  $this->fpdf = new FPDF();
  $this->fpdf->AddPage('portrait', 'letter');
  $this->fpdf->setFont('Arial', '', '12');
  $this->fpdf->Cell(100, 5, 'Clase de setFont, formato de letra Arial 12'); //Se ve en milimetros 1000 milimetros es un metro
  $this->fpdf->Ln(); //Salto de linea en una hoja
  $this->fpdf->setFont('courier', 'B', '14');
  $this->fpdf->Write(5,'Segunda Linea, formato Courier Negrita 14');
  $this->fpdf->OutPut();

  //CLASE 4
  $this->fpdf = new FPDF();
  $this->fpdf->AddPage('PORTRAIT', 'LETTER');

  //TITULO DEL REPORTE
  $this->fpdf->setFont('Arial', 'B', '14');
  $this->fpdf->Write(10, 'REPORTE DE VENTAS');
  $this->fpdf->Ln(15);

  //CABECERA DE  LA TABLA
  $this->fpdf->setFont('Arial', 'B', '10');
  $this->fpdf->Cell(20, 10, 'CODIGO', 1, 0,'C', false); //ANCHO, ALTO, TEXTO, BORDES, POSICION CELDA,ALINEACION 'C,L,R'
  $this->fpdf->Cell(45, 10, 'NOMBRE COMPLETO', 1, 0,'C', false);
  $this->fpdf->Cell(75, 10, utf8_decode('DIRECCIÓN'), 1, 0,'C', false);
  $this->fpdf->Ln();


  //FILAS DE LA TABLA
  $this->fpdf->setFont('Arial', '', '10');
  $this->fpdf->Cell(20, 10, 'COD-0001', 1, 0, false);
  $this->fpdf->Cell(45, 10, 'SAUL MINAYA', 1, 0, false);
  $this->fpdf->Cell(75, 10, utf8_decode('JR. 28 DE MARZO LA FLOR CARABAYLLO'), 1, 0, false);
  $this->fpdf->OutPut();


  //CLASE 5 OutPut
  $this->fpdf = new FPDF();
  $this->fpdf->AddPage('PORTRAIT', 'LETTER');

  //TITULO DEL REPORTE
  $this->fpdf->setFont('Arial', 'B', '14');
  $this->fpdf->Write(10, 'REPORTE DE VENTAS');
  $this->fpdf->Ln(15);

  //CABECERA DE  LA TABLA
  $this->fpdf->setFont('Arial', 'B', '10');
  $this->fpdf->Cell(20, 10, 'CODIGO', 1, 0,'C', false);
  $this->fpdf->Cell(45, 10, 'NOMBRE COMPLETO', 1, 0,'C', false);
  $this->fpdf->Cell(75, 10, utf8_decode('DIRECCIÓN'), 1, 0,'C', false);
  $this->fpdf->Ln();


  //FILAS DE LA TABLA
  $this->fpdf->setFont('Arial', '', '10');
  $this->fpdf->Cell(20, 10, 'COD-0001', 1, 0, false);
  $this->fpdf->Cell(45, 10, 'SAUL MINAYA', 1, 0, false);
  $this->fpdf->Cell(75, 10, utf8_decode('JR. 28 DE MARZO LA FLOR CARABAYLLO'), 1, 0, false);
  $this->fpdf->OutPut('I','Reporte Ventas.pdf'); //Destino [I,D,F,S], nombre del archivo,

  //Clase 6 Encabezado y Pie de Pagina

  class PDF extends FPDF {

  public function header() { //Encabezado
  $this->SetFont('Arial', 'B', 10);
  $this->Write(5, 'Lima 2010');
  $this->SetX(175);
  $this->Write(5, utf8_decode('Provías Nacional')); //alto y texto
  }

  public function footer() { //Pie de Pagina
  $this->SetFont('Arial', 'B', 10);
  $this->SetY(-15);
  $this->Write(5, '4 de marzo del 2020');
  }

  }

  $this->fpdf = new PDF();
  $this->fpdf->AddPage('portrait', 'letter');
  $this->fpdf->setFont('Arial', 'B', 14);
  $this->fpdf->SetY(20);
  $this->fpdf->Cell(0, 5, 'Reporte de Ventas', 0, 0, 'C');
  $this->fpdf->AddPage('portrait', 'letter');
  $this->fpdf->OutPut();

  //Clase 7: Encabezado, Pie de Pagina, Imagen


  class PDF extends FPDF {

  //Parametros de Imagen = [ruta,posicion X , posicion Y, alto,ancho, tipo, link]

  public function header() { //Encabezado
  $this->SetFont('Arial', 'B', 10);
  $this->Write(5, utf8_decode('Lima - Perú'));
  $this->Image(base_url() . '/dist/img/logo.png', 170, 10, 30, 10,'PNG', base_url().'Reportes/Controller_reportes');
  }

  public function footer() { //Pie de Pagina
  $this->SetFont('Arial', 'B', 10);
  $this->SetY(-15);
  $this->Write(5, '4 de marzo del 2020');
  }

  }

  $this->fpdf = new PDF();
  $this->fpdf->AddPage('portrait', 'letter');
  $this->fpdf->setFont('Arial', 'B', 14);
  $this->fpdf->SetY(20);
  $this->fpdf->Cell(0, 5, 'Reporte de Ventas', 0, 0, 'C');
  $this->fpdf->AddPage('portrait', 'letter');
  $this->fpdf->Image(base_url() . '/dist/img/logo.png', 170, 10, 30, 10,'PNG');
  $this->fpdf->OutPut();





  /*

  //Clase 8: Numero de Pagina

  class PDF extends FPDF {

  //$fpdf->PageNO() =numero de pagina actual
  //$fpdf->AliasNbPages() =numero total de paginas
  // "numero de pagina 1 de {nb} "

  public function header() {
  $this->SetFont('Arial', 'B', 10);
  $this->Write(5, utf8_decode('Lima - Perú'));
  $this->Image(base_url() . '/dist/img/logo.png', 170, 10, 30, 10,'PNG', base_url().'Reportes/Controller_reportes');
  }

  public function footer() {
  $this->SetFont('Arial', 'B', 10);
  $this->SetY(-15);
  $this->Write(5, '4 de marzo del 2020');
  $this->SetX(-15);
  $this->Write(5, $this->PageNo());
  }

  }

  $this->fpdf = new PDF();
  $this->fpdf->AddPage('portrait', 'letter');
  $this->fpdf->setFont('Arial', 'B', 14);
  $this->fpdf->SetY(20);
  $this->fpdf->Cell(0, 5, 'Reporte de Ventas', 0, 0, 'C');
  $this->fpdf->AddPage('portrait', 'letter');
  $this->fpdf->Image(base_url() . '/dist/img/logo.png', 170, 10, 30, 10,'PNG');
  $this->fpdf->OutPut();
  ?>
  ?>



  //Clase 9: color de texto

  class PDF extends FPDF { //

  public function header() {
  $this->SetFont('Arial', 'B', 10);
  $this->SetTextColor(74, 202, 22); //COLORES RGB BUSCAR EN GOOGLE
  $this->Write(5, ('Lima - Perú'));
  $this->Image(base_url() . '/dist/img/logo.png', 170, 10, 30, 10,'PNG', base_url().'Reportes/Controller_reportes');
  }

  public function footer() {
  $this->SetFont('Arial', 'B', 10);
  $this->SetY(-15);
  $this->Write(5, '4 de marzo del 2020');
  $this->SetX(-15);
  $this->Write(5, $this->PageNo());
  }

  }

  $this->fpdf = new PDF('P','mm','letter',true);
  $this->fpdf->AddPage('portrait', 'letter');
  $this->fpdf->setFont('Arial', 'BU', 14); //SUBRAYADO
  $this->fpdf->SetY(20);
  $this->fpdf->SetTextColor(16, 87, 97); //COLORES RGB BUSCAR EN GOOGLE
  $this->fpdf->Cell(0, 5, 'REPORTE DE VENTAS', 0, 0, 'C');
  $this->fpdf->SetTextColor(0, 0, 0); //LE PONGO CERO PORQUE YA ES UNA SECCION DIFERENTE
  $this->fpdf->Ln(20);


  $this->fpdf->setFont('Arial', '', 12);
  $this->fpdf->Cell(20,5,'GRADO: ');

  //$this->fpdf->Cell(20,5,'Número',1,0,'CS');


  //Clase 10: configuracion de codificacion, color de relleno y dibujo
  //EN EL VIDEO 10 CONFIGURO EL utf8_decode fpdf.php
  class PDF extends FPDF { //

  public function header() {
  $this->SetFont('Arial', 'B', 10);
  $this->SetTextColor(74, 202, 22); //COLORES RGB BUSCAR EN GOOGLE
  $this->Write(5, ('Lima - Perú'));
  $this->Image(base_url() . '/dist/img/logo.png', 170, 10, 30, 10,'PNG', base_url().'Reportes/Controller_reportes');
  }

  public function footer() {
  $this->SetFont('Arial', 'B', 10);
  $this->SetY(-15);
  $this->Write(5, '4 de marzo del 2020');
  $this->SetX(-15);
  $this->Write(5, $this->PageNo());
  }

  }

  $this->fpdf = new PDF('P','mm','letter',true); //Le paso true para que decodifique segun el metodo constructor del archivo fpdf.php
  $this->fpdf->AddPage('portrait', 'letter');
  $this->fpdf->setFont('Arial', 'BU', 14); //SUBRAYADO
  $this->fpdf->SetY(20);
  $this->fpdf->SetTextColor(16, 87, 97); //COLORES RGB BUSCAR EN GOOGLE
  $this->fpdf->Cell(0, 5, 'REPORTE DE VENTAS', 0, 0, 'C');
  $this->fpdf->SetTextColor(0, 0, 0); //LE PONGO CERO PORQUE YA ES UNA SECCION DIFERENTE

  $this->fpdf->Ln(20); //SALTO DE LINEA


  $this->fpdf->setFont('Arial', '', 12);
  $this->fpdf->Cell(20,5,'GRADO: ');
  $this->fpdf->Ln(); //SALTO DE LINEA
  $this->fpdf->Cell(20,5,'SECCIÓN: ');
  $this->fpdf->Ln(); //SALTO DE LINEA
  $this->fpdf->Cell(20,5,'TURNOS: ');
  $this->fpdf->Ln(); //SALTO DE LINEA
  $this->fpdf->Cell(20,5,'DOCENTE: ');
  $this->fpdf->Ln(20); //SALTO DE LINEA


  $this->fpdf->setFontSize(10); //Para reducir el tamaño de la cabecera de la tabla
  $this->fpdf->setFont('Arial','B'); //Para poner negrita
  $this->fpdf->setFillColor(255, 51, 165); //Para poner relleno
  $this->fpdf->setTextColor(254,255,255); //Para poner color del texto
  $this->fpdf->setDrawColor(255, 51, 165); //Color del borde, va de la mano que el relleno
  $this->fpdf->Cell(20,5,'ITEM',1,0,'C',1); //El 1 al final es los bordes y pueda estar de color
  $this->fpdf->Cell(50,5,'PRODUCTO',1,0,'C',1);
  $this->fpdf->Cell(50,5,'DESCRIPCIÓN',1,0,'C',1);
  $this->fpdf->Cell(30,5,'PRECIO',1,0,'C',1);
  $this->fpdf->Cell(40,5,'CANTIDAD',1,0,'C',1);


  $this->fpdf->OutPut();


  ?>
  ?>



  //Clase 11: Trazado de Lineas: DIBUJANDO

  class PDF extends FPDF { //

  public function header() {
  $this->SetFont('Arial', 'B', 10);
  $this->SetTextColor(74, 202, 22); //COLORES RGB BUSCAR EN GOOGLE
  $this->Write(5, ('Lima - Perú'));
  $this->Image(base_url() . '/dist/img/logo.png', 170, 10, 30, 10,'PNG', base_url().'Reportes/Controller_reportes');
  }

  public function footer() {
  $this->SetFont('Arial', 'B', 10);
  $this->SetY(-15);
  $this->Write(5, '4 de marzo del 2020');
  $this->SetX(-15);
  $this->Write(5, $this->PageNo());
  }

  }

  $this->fpdf = new PDF('P','mm','letter',true); //Le paso true para que decodifique segun el metodo constructor del archivo fpdf.php
  $this->fpdf->AddPage('portrait', 'letter');
  $this->fpdf->setFont('Arial', '', 14); //SUBRAYADO
  $this->fpdf->SetY(20);
  $this->fpdf->SetTextColor(16, 87, 97); //COLORES RGB BUSCAR EN GOOGLE

  $this->fpdf->SetDrawColor(255, 51, 165);  //color de la linea
  $this->fpdf->SetLineWidth(0.5);  //ancho de la linea
  $this->fpdf->Line(75,26,140,26); //posiciones de la linea x(75,26) y(140,26)

  $this->fpdf->Cell(0, 5, 'REPORTE DE VENTAS', 0, 0, 'C');
  $this->fpdf->SetTextColor(0, 0, 0); //LE PONGO CERO PORQUE YA ES UNA SECCION DIFERENTE

  $this->fpdf->Ln(20); //SALTO DE LINEA


  $this->fpdf->setFont('Arial', '', 12);
  $this->fpdf->Cell(20,5,'GRADO: ');
  $this->fpdf->Ln(); //SALTO DE LINEA
  $this->fpdf->Cell(20,5,'SECCIÓN: ');
  $this->fpdf->Ln(); //SALTO DE LINEA
  $this->fpdf->Cell(20,5,'TURNOS: ');
  $this->fpdf->Ln(); //SALTO DE LINEA
  $this->fpdf->Cell(20,5,'DOCENTE: ');
  $this->fpdf->Ln(20); //SALTO DE LINEA


  $this->fpdf->setFontSize(10); //Para reducir el tamaño de la cabecera de la tabla
  $this->fpdf->setFont('Arial','B'); //Para poner negrita
  $this->fpdf->setFillColor(255, 255, 255); //Para poner relleno
  $this->fpdf->setTextColor(40,40,40); //Para poner color del texto
  $this->fpdf->setDrawColor(88, 88, 88); //Color del borde, va de la mano que el relleno
  $this->fpdf->Cell(20,10,'ITEM',0,0,'C',1); //El 1 al final es los bordes y pueda estar de color
  $this->fpdf->Cell(50,10,'PRODUCTO',0,0,'C',1);
  $this->fpdf->Cell(50,10,'DESCRIPCIÓN',0,0,'C',1);
  $this->fpdf->Cell(30,10,'PRECIO',0,0,'C',1);
  $this->fpdf->Cell(40,10,'CANTIDAD',0,0,'C',1);



  $this->fpdf->SetDrawColor(255, 51, 165);  //61,174,233
  $this->fpdf->SetLineWidth(1);
  $this->fpdf->Line(16,85,190,85);
  $this->fpdf->setTextColor(0,0,0);
  $this->fpdf->OutPut();


 */

//Clase 12: Estilizar Tablas y Mostrar Registros
class PDF extends FPDF { // 

    public function header() {
        $this->SetFont('Arial', 'B', 10);
        $this->SetTextColor(74, 202, 22); //COLORES RGB BUSCAR EN GOOGLE
        $this->Write(5, ('Lima - Perú'));
        $this->Image(base_url() . '/dist/img/logo.png', 170, 10, 30, 10, 'PNG', base_url() . 'Movimientos/Controller_ventas');
    }

    public function footer() {
        $this->SetFont('Arial', 'B', 10);
        $this->SetY(262);
        $this->Write(5, '4 de marzo del 2020');
        $this->SetX(191);
        $this->Write(5, $this->PageNo());
    }

}

$this->fpdf = new PDF('P', 'mm', 'letter', true); //Le paso true para que decodifique segun el metodo constructor del archivo fpdf.php
$this->fpdf->AddPage('portrait', 'letter');
$this->fpdf->SetMargins(10, 25, 20, 20);

$this->fpdf->setFont('Arial', '', 14); //SUBRAYADO
$this->fpdf->SetY(20);
$this->fpdf->SetTextColor(16, 87, 97); //COLORES RGB BUSCAR EN GOOGLE

$this->fpdf->SetDrawColor(255, 51, 165);  //color de la linea
$this->fpdf->SetLineWidth(0.5);  //ancho de la linea
$this->fpdf->Line(75, 26, 140, 26); //posiciones de la linea x(75,26) y(140,26)

$this->fpdf->Cell(0, 5, 'REPORTE DE VENTAS', 0, 0, 'C');
$this->fpdf->SetTextColor(0, 0, 0); //LE PONGO CERO PORQUE YA ES UNA SECCION DIFERENTE


$this->fpdf->Ln(20); //SALTO DE LINEA


$this->fpdf->setFont('Arial', 'B', 10);
$this->fpdf->setTextColor(61, 174, 233);
$this->fpdf->Cell(30, 5, 'VENTA');
$this->fpdf->setFont('Arial', '');
$this->fpdf->setTextColor(40, 40, 40);
$this->fpdf->Cell(20, 5, ': ' . $cabecera->cod_venta);
$this->fpdf->Ln(); //SALTO DE LINEA

$this->fpdf->setFont('Arial', 'B', 10);
$this->fpdf->setTextColor(61, 174, 233);
$this->fpdf->Cell(30, 5, 'CLIENTE');
$this->fpdf->setFont('Arial', '');
$this->fpdf->setTextColor(40, 40, 40);
$this->fpdf->Cell(20, 5, ': ' . $cabecera->ds_cliente);
$this->fpdf->Ln(); //SALTO DE LINEA


$this->fpdf->setFont('Arial', 'B', 10);
$this->fpdf->setTextColor(61, 174, 233);
$this->fpdf->Cell(30, 5, 'DIRECCIÓN');
$this->fpdf->setFont('Arial', '');
$this->fpdf->setTextColor(40, 40, 40);
$this->fpdf->Cell(20, 5, ': ' . $cabecera->direccion);
$this->fpdf->Ln(); //SALTO DE LINEA

$this->fpdf->Ln(20); //SALTO DE LINEA



$this->fpdf->setFontSize(9); //Para reducir el tamaño de la cabecera de la tabla
$this->fpdf->setFont('Arial', 'B'); //Para poner negrita
$this->fpdf->setFillColor(255, 255, 255); //Para poner relleno
$this->fpdf->setTextColor(40, 40, 40); //Para poner color del texto
$this->fpdf->setDrawColor(88, 88, 88); //Color del borde, va de la mano que el relleno
$this->fpdf->Cell(20, 10, 'ITEM', 0, 0, 'C', 1); //El 1 al final es los bordes y pueda estar de color
$this->fpdf->Cell(50, 10, 'PRODUCTO', 0, 0, 'C', 1);
$this->fpdf->Cell(50, 10, 'DESCRIPCIÓN', 0, 0, 'C', 1);
$this->fpdf->Cell(30, 10, 'PRECIO', 0, 0, 'C', 1);
$this->fpdf->Cell(40, 10, 'CANTIDAD', 0, 0, 'C', 1);
$this->fpdf->SetDrawColor(255, 51, 165);
$this->fpdf->SetLineWidth(1);
$this->fpdf->Line(10.5, 85, 199.5, 85);
$this->fpdf->setTextColor(0, 0, 0);


//print_r($detalle); 
//die();
$this->fpdf->setFontSize(8); //Para reducir el tamaño de la cabecera de la tabla
$this->fpdf->SetLineWidth(0.2);
$this->fpdf->setFillColor(240, 240, 240);
$this->fpdf->setTextColor(40, 40, 40);
$this->fpdf->SetDrawColor(255, 255, 255);
$this->fpdf->Ln(12); //Separa la cabecera de la tabla
foreach ($detalle as $grilla_detalle) {
    $this->fpdf->Cell(20, 10, $grilla_detalle->item, 1, 0, 'C', 1); //El 1 al final es los bordes y pueda estar de color
    $this->fpdf->Cell(50, 10, $grilla_detalle->ds_producto, 1, 0, 'C', 1);
    $this->fpdf->Cell(50, 10, $grilla_detalle->marca, 1, 0, 'C', 1);
    $this->fpdf->Cell(30, 10, $grilla_detalle->precio, 1, 0, 'C', 1);
    $this->fpdf->Cell(40, 10, $grilla_detalle->cantidad, 1, 0, 'C', 1);
    $this->fpdf->Ln(); //SALTO DE LINEA
}


$this->fpdf->OutPut();
?>
