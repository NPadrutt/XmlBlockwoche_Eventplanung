<?php
$language = "de";
require ("incl/helper.php");
include ("incl/header.php");
?>
<h1>Anmeldungbestätigung</h1>

<?php 
$event_id = $_POST["event_id"];
$firstname = $_POST["prename"];
$name  = $_POST["name"];
$street  = $_POST["street"];
$zipcode  = $_POST["zipcode"];
$city  = $_POST["city"];
$zipcode  = $_POST["zipcode"];
$email  = $_POST["email"];
$phonenumber  = $_POST["phonenumber"];


$fileContents = file_get_contents('data/applications.xml');
$document = new DOMDocument();
$document->loadXML($fileContents);

// run xpath query
$xPath = new DOMXPath($document);
$last_id = intval($xPath->evaluate("count(//participant)"));

$participant_id = $last_id + 1;


$application_data=array(
    "participant_id" => $participant_id,
    "event_id" => $event_id,
    "firstname" => $firstname,
    "name" => $name, 
    "street" => $street,     
    "zipcode" => $zipcode,
    "city" => $city,
    "phonenumber" => $phonenumber,
    "email" => $email
);

$application_xml = add_application($application_data);
file_put_contents('data/applications.xml', $application_xml);


// generate HTML output and show results of service request

require_once 'fop_service_client.php';


$eventIdParamFromInput =  1; //$_POST["eventIdParamFromInput"];
$participantIdParamFromInput =  1; //$_POST["eventIdParamFromInput"];
$targetFile = 'confirmation.fo';

$xmlDoc = new DOMDocument();
$xmlDoc->load("data/events.xml");

$xslDoc = new DOMDocument();
$xslDoc->load("applicationConfirmation.xsl");

$proc = new XSLTProcessor();
$proc->setParameter('','eventIdParam', $event_id);
$proc->setParameter('','participantIdParam', $participant_id);
$proc->importStylesheet($xslDoc);
$xml = $proc->transformToXML($xmlDoc);

file_put_contents($targetFile, $xml);

$serviceClient = new FOPServiceClient();
$pdfFile = $serviceClient->processFile($targetFile);

echo sprintf('<p>Das PDF kann mit untenstehendem Link ge&ouml;ffnet werden:<br><strong><a href="%s">%s</a></strong></p>', $pdfFile, "PDF Download");
?>



<?php
include ("incl/footer.php");
?>				
				

