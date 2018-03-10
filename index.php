
	<?php
$language = "de";
require ("incl/helper.php");
include ("incl/header.php");

?>

<h1>Willkommen</h1>
<p>Behindertensport ist ....</p>
<p>
	<a class="uk-button uk-button-default" href="events.php">Alle Events</a>
</p>
<h2>Unsere Veranstaltungen</h2>
<?php

display_disabilites();

include ("incl/footer.php");
?>