<?php

require_once __DIR__ . "/../vendor/autoload.php";

$dompdf = new \Dompdf\Dompdf();
$dompdf->getOptions()->setChroot(__DIR__);

$page = file_get_contents("html/cartao.html");
$page = str_replace("../", "", $page);

$dompdf->loadHtml($page);

$dompdf->setPaper([0, 0, 510.24, 907.09]);

$dompdf->render();

$dompdf->stream("cartao", ["Attachment" => 0]);