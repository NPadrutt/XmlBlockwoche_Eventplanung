<?php

function get_disabilities_by_event($event_id, $event_disabilty_relations_xml)
{
    $disabilites_id_array = $event_disabilty_relations_xml->xpath("//relation/event_id[text()='" . $event_id . "']/../disability_id/text()");
    return implode($disabilites_id_array, ",");
}

function display_disabilites()
{
    $data = file_get_contents('data/disabilities.xml');
    $xml = new DOMDocument();
    $xml->loadXML($data);
    
    // load XSL
    $xsl = new DOMDocument();
    $xsl->load('data/disabilities.xsl');
    
    // transform
    $processor = new XSLTProcessor();
    $processor->importStylesheet($xsl);
    $dom = $processor->transformToDoc($xml);
    
    // send result to client
    echo $dom->saveXML();
}

function formateDate($date){
    $date_time = new DateTime($date);
    return $date_time->format('d.m.Y H:i');
}


function display_event_details($event_id){
    $data = file_get_contents('data/events.xml');
    $xml = new DOMDocument();
    $xml->loadXML($data);
    
    // load XSL
    $xsl = new DOMDocument();
    $xsl->load('data/event_details.xsl');
    
    // determine disability parameter
    $category = "index";
    if (isset($_GET["category"])){
        $category = $_GET["category"];
    }
    
    // transform
    $processor = new XSLTProcessor();
    $processor->importStylesheet($xsl);
    $processor->setParameter("", "event_id", $event_id);
    $dom = $processor->transformToDoc($xml);
    
    // send result to client
    return $dom->saveXML();
}


function get_events_by_disability($disability_id) {
    $data = file_get_contents('data/events.xml');
    $xml = new DOMDocument();
    $xml->loadXML($data);
    
    // load XSL
    $xsl = new DOMDocument();
    $xsl->load('data/events.xsl');
    
    // determine disability parameter
    $category = "index";
    if (isset($_GET["category"])){
        $category = $_GET["category"];
    }
    
    // transform
    $processor = new XSLTProcessor();
    $processor->importStylesheet($xsl);
    $processor->setParameter("", "category", $category);
    $dom = $processor->transformToDoc($xml);
    
    // send result to client
    $doc->formatOutput = true;
    return $dom->saveXML();
    
}

function add_application($application_data){
    
    // load XML
    $fileContents = file_get_contents('data/applications.xml');
    $document = new DOMDocument();
    $document->loadXML($fileContents);
    
    // run xpath query
    $xPath = new DOMXPath($document);
    $last_id = intval($xPath->evaluate("count(//participant)"));
    
    
    // last event elemenet
    $participants_node = $xPath->query('//participants');
    $participant_node = $document->createElement('participant');
    $participant_attribute = $document->createAttribute("id");
    $participant_attribute->value = $application_data['participant_id'];
    $participant_node->appendChild($participant_attribute);
    
    $event_id_node = $document->createElement('event_id');
    $event_id_node_text = $document->createTextnode($application_data['event_id']);
    $event_id_node->appendChild($event_id_node_text);
    
    $firstname_node = $document->createElement('prename');
    $firstname_node_text = $document->createTextnode($application_data['firstname']);
    $firstname_node->appendChild($firstname_node_text);
    
    $name_node = $document->createElement('name');
    $name_node_text = $document->createTextnode($application_data['name']);
    $name_node->appendChild($name_node_text);
    
    $street_node = $document->createElement('street');
    $street_node_text = $document->createTextnode($application_data['street']);
    $street_node->appendChild($street_node_text);
    
    $zipcode_node = $document->createElement('zipcode');
    $zipcode_node_text = $document->createTextnode($application_data['zipcode']);
    $zipcode_node->appendChild($zipcode_node_text);
    
    $city_node = $document->createElement('city');
    $city_node_text = $document->createTextnode($application_data['city']);
    $city_node->appendChild($city_node_text);
    
    $phonenumber_node = $document->createElement('phonenumber');
    $phonenumber_node_text = $document->createTextnode($application_data['phonenumber']);
    $phonenumber_node->appendChild($phonenumber_node_text);
    
    $email_node = $document->createElement('email');
    $email_node_text = $document->createTextnode($application_data['email']);
    $email_node->appendChild($email_node_text);
    
    $prepaid_node = $document->createElement('prepaid');
    $prepaid_node_text = $document->createTextnode('true');
    $prepaid_node->appendChild($prepaid_node_text);
    
    // apend new application child nodes as new child of applications
    $participant_node->appendChild($event_id_node);
    $participant_node->appendChild($firstname_node);
    $participant_node->appendChild($name_node);
    $participant_node->appendChild($street_node);
    $participant_node->appendChild($zipcode_node);
    $participant_node->appendChild($city_node);
    $participant_node->appendChild($phonenumber_node);
    $participant_node->appendChild($email_node);
    $participant_node->appendChild($prepaid_node);
    
    // Insert the new element
    $participants_node->item(0)->appendChild($participant_node);
    return $document->saveXML();
}



?>