<?php

use chillerlan\QRCode\Output\QROutputInterface;

require_once __DIR__ . '/vendor/autoload.php';


$options = new \chillerlan\QRCode\QROptions([
    'version'      => 7,
    'outputType'   => QROutputInterface::GDIMAGE_PNG,
    'scale'        => 4,
    'imageBase64'  => false,
]);

for ($i = 1; $i < 1001; $i++) {
    $value = 'GL' . str_pad($i, 8, "0", STR_PAD_LEFT);
    $qrcode = new \chillerlan\QRCode\QRCode($options);
    $qrcode->addByteSegment($value);
    $qrOutputInterface = new \App\QRComTexto($options, $qrcode->getMatrix());
    // dump the output, with additional text
    // the text could also be supplied via the options, see the svgWithLogo example
    $qrOutputInterface->dump("/tmp/output/$value.png", $value);
    echo 'Gerando QRCode: ' . $value;
}
//$qrcode = new \chillerlan\QRCode\QRCode($options);
//$qrcode->addByteSegment('https://crmergon.grupoergon.com.br/');
//header('Content-type: image/png');
//$qrOutputInterface = new \App\QRComTexto($options, $qrcode->getMatrix());
//// dump the output, with additional text
//// the text could also be supplied via the options, see the svgWithLogo example
//$qrOutputInterface->dump('/tmp/output/teste.png', 'GL00000001');