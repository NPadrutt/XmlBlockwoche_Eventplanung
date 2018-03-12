	<?php
$language = "de";
require ("incl/helper.php");
include ("incl/header.php");

?>
 
<h1>Willkommen</h1>
 <div class="content-panel">
    Sport hält Körper und Geist fit, bringt Menschen zusammen und erweitert Horizonte. Wir engagieren uns dafür, dass dies für so viele Menschen wie möglich zur Verfügung steht.
</div>
<br/>
<h2>Unsere Veranstaltungen</h2>
<p>
Wir bieten Sportveranstaltungen für Menschen mit folgenden Einschränkungen an
	<a class="uk-button uk-button-primary uk-button-large uk-float-right" href="events.php">Alle Events</a>
<br/><br/>
<?php

display_disabilites();

include ("incl/footer.php");
?>

