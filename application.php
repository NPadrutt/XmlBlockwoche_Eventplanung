<?php
$language = "de";
require ("incl/helper.php");
include ("incl/header.php");
?>
<h1>Anmeldung</h1>

<?php 
$event_id = $_GET["event_id"];
echo display_event_details($event_id); 
?>

<form class="uk-form-horizontal uk-margin-large" action="confirmation.php" method="POST">
	<input type="hidden" value="<?php echo $event_id;?>" name="event_id">
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">Vorname</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="Hans" name="prename">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">Name</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="Muster" name="name">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">Adresse,
			Nummer</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="Hauptstrasse 1" name="street">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">PLZ</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="6000" name="zipcode">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">Stadt</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="Luzern" name="city">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">Telefonnummer</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="079 123 45 67" name="phonenumber">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">e-Mail</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="muster@mail.ch" name="email">
		</div>
	</div>
	<button class="uk-button uk-button-primary uk-button-large" type="submit">Anmelden</button>
</form>

</tbody>
</table>

<?php
include ("incl/footer.php");
?>				
				

