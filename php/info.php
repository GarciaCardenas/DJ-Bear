
	<?php

require('fpdf185/fpdf.php');

// Función para generar el folio
function generarFolio($rfc, $fechaEvento) {
    $fechaSinGuiones = str_replace("-", "", $fechaEvento);
    $folio = $rfc . $fechaSinGuiones;
    return $folio;
}

// Obtener los datos del formulario
session_name('DatosPDF');
session_start();
$nombre = $_SESSION["nombre"];
$paterno = $_SESSION["paterno"];
$materno = $_SESSION["materno"];
$telefono = $_SESSION["telefono"];
$mail = $_SESSION["correo"];
$calle = $_SESSION["calle"];
$numeroDomicilio = $_SESSION["numero"];
$colonia = $_SESSION["colonia"];
$codigoPostal = $_SESSION["codigoPostal"];
$entidad = $_SESSION["entidad"];
$municipio = $_SESSION["municipio"];
$nacimiento = $_SESSION["fechaNacimiento"];
$rfc = $_SESSION["rfc"];
$tipo = $_SESSION["tipo"];
$salon = $_SESSION["salon"];
$menu = $_SESSION["menu"];
$numeroPersonas = $_SESSION["numPersonas"];
$fecha = $_SESSION["fechaEvento"];
$hora = $_SESSION["horaEvento"];
$folio = generarFolio($rfc, $fecha);

// Crear el objeto PDF
$pdf = new FPDF();
$pdf->AddPage();

// Configurar la fuente y tamaño
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->SetTextColor(0, 0, 0);

// Título del comprobante
$pdf->Cell(0, 10, utf8_decode('Comprobante de Reservación'), 0, 1, 'C');
$pdf->Ln(10);

// Datos del cliente
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 8, utf8_decode('Datos del Cliente'), 0, 1, 'C');
$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(40, 8, utf8_decode('Nombre:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($nombre . ' ' . $paterno . ' ' . $materno), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Teléfono:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($telefono), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Correo:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($mail), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Calle:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($calle), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Número:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($numeroDomicilio), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Colonia:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($colonia), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Código Postal:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($codigoPostal), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Entidad:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($entidad), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Municipio:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($municipio), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Fecha de Nacimiento:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($nacimiento), 1, 1, 'L');
$pdf->Ln(12);

// Datos de la reservación
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 8, utf8_decode('Datos de la Reservación'), 0, 1, 'C');
$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(40, 8, utf8_decode('Fecha:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($fecha), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Hora:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($hora), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Salón:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($salon), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Menú:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($menu), 1, 1, 'L');
$pdf->Cell(40, 8, utf8_decode('Número de Personas:'), 1, 0, 'L');
$pdf->Cell(0, 8, utf8_decode($numeroPersonas), 1, 1, 'L');
//$pdf->Ln(12);

// Folio de reservación
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->SetY(-40);
$pdf->Cell(0, 10, utf8_decode('Folio: ' . $folio), 0, 1, 'C');

//Enviar PDF
ob_clean();
$pdf->Output('I','comprobante.pdf');
header('Content-Disposition: attachment; filename="comprobante.pdf"');
readfile('comprobante.pdf');
exit;
?>
