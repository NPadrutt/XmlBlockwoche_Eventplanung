<?php
$language = "de";
require ("incl/helper.php");
include ("incl/header.php");
?>
<h1>Anmeldung</h1>

<div class="content-panel">
<?php 
$event_id = $_GET["event_id"];
echo display_event_details($event_id); 
?>
</div>

<form class="uk-form-horizontal uk-margin-large" action="confirmation.php" method="POST">
	<input type="hidden" value="<?php echo $event_id;?>" name="event_id">
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">Vorname</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="Hans" name="prename"  required="required">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">Name</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="Muster" name="name"  required="required">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">Strasse,
			Hausnummer</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="Hauptstrasse 1" name="street"   required="required">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">PLZ</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="6000" name="zipcode" required="required">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">Stadt</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="text"
				placeholder="Luzern" name="city" required="required">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">Telefonnummer</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="tel"
				placeholder="079 123 45 67" name="phonenumber" required="required">
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label" for="form-horizontal-text">e-Mail</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="form-horizontal-text" type="email"
				placeholder="muster@mail.ch" name="email" required="required">
		</div>
	</div>
	<div class="uk-margin">
        <div class="uk-form-label">Zahlungsart</div>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="prepaid" value="true" selected="selected"> Im Voraus</label><br>
            <label><input class="uk-radio" type="radio" name="prepaid" value="false"> Vor Ort</label>
            <div style="padding-top:20px;">
            	<button class="uk-button uk-button-primary uk-button-large" type="submit">Anmelden</button>
            </div>
            
        </div>
    </div>
</form>

</tbody>
</table>

<?php
include ("incl/footer.php");
?>				
				

