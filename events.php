<?php
$language = "de";
require ("incl/helper.php");
include ("incl/header.php"); 
?>
<h1>Events</h1>
<?php
$event_disabilty_relations_xml = simplexml_load_file('data/event_supports_disability.xml');
$relation = $event_disabilty_relations_xml->xpath("//relation");
$filter_is_active = false;
$categoryId="index";
if (isset($_GET["category"])) {
    $categoryId = $_GET["category"];
    $filter_is_active = true;
}
echo get_events_by_disability($categoryId);
?> 


<?php

include ("incl/footer.php");
?>				
				

