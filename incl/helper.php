<?php


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
    return $dom->saveXML();

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