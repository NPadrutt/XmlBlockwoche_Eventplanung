<?php

function get_events_by_disability($disability_id, $event_disabilty_relations_xml)
{
    $supported_events = $event_disabilty_relations_xml->xpath("//relation/disability_id[text()='" . $disability_id . "']/../event_id/text()");
    $supported_events_array = array();
    
    foreach ($supported_events as $event_id) {
        $event_id = (string) $event_id;
        array_push($supported_events_array, $event_id);
    }
    return $supported_events_array;
}

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
?>