<?php

require_once __DIR__ . "/../vendor/autoload.php";

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$options = new Options();
$options->set('isRemoteEnabled',true);
$dompdf = new Dompdf( $options );

$page = file_get_contents(__DIR__ . "/html/cartao.html");
$page = str_replace("../img/phone.png", "https://github.com/falves97/form-server-info/blob/main/img/icons/telefone.png?raw=true", $page);

//echo $page;

//var_dump($page);

$dompdf->loadHtml(file_get_contents(__DIR__ . "/html/cartao.html"));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("cartaopdf", ['Attachment' => 0]);