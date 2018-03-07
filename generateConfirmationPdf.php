<?php

// load the FOP client.
require_once 'fop_service_client.php';

$eventIdParamFromInput =  1; //$_POST["eventIdParamFromInput"];
$participantIdParamFromInput =  1; //$_POST["eventIdParamFromInput"];
$targetFile = 'confirmation.fo';

$xmlDoc = new DOMDocument();
$xmlDoc->load("data/events.xml");

$xslDoc = new DOMDocument();
$xslDoc->load("applicationConfirmation.xsl");

$proc = new XSLTProcessor();
$proc->setParameter('','eventIdParam',$eventIdParamFromInput);
$proc->setParameter('','participantIdParam',$participantIdParamFromInput);
$proc->importStylesheet($xslDoc);
$xml = $proc->transformToXML($xmlDoc);

file_put_contents($targetFile, $xml);

$serviceClient = new FOPServiceClient();
$pdfFile = $serviceClient->processFile($targetFile);

// generate HTML output and show results of service request
echo '<h1>Anmeldebestätigung</h1>';
echo sprintf('<p>Das PDF kann mit untenstehendem Link ge&ouml;ffnet werden:<br><strong><a href="%s">%s</a></strong></p>', $pdfFile, $pdfFile);

?>