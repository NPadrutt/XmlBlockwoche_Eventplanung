
	<?php
$language = "de";
require ("incl/helper.php");
include ("incl/header.php");

?>

<h1>Willkommen</h1>
<p>
    Sport hält Körper und Geist fit, bringt Menschen zusammen und erweitert Horizonte. Wir engagieren uns dafür, dass dies für so viele Menschen wie möglich zur Verfügung steht.
</p>
<p>
	<a class="uk-button uk-button-default" href="events.php">Alle Events</a>
</p>
<h2>Unsere Veranstaltungen</h2>
<?php

display_disabilites();

include ("incl/footer.php");
?>