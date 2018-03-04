<html>
    <head>
        <meta charset="utf-8">
        <script src="assets/jquery/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/uikit/js/uikit.min.js"></script>
        <link rel="stylesheet" href="assets/uikit/css/uikit.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
     </head>
<body>

	<?php
        $language = "de";
        require ("incl/helper.php");
    ?>
	<div class="uk-offcanvas-content">
		<div class="uk-navbar-container tm-navbar-container" id="topnav">
			<div class="uk-container uk-container-expand">
				<nav class="uk-navbar">
					<div class="uk-navbar-left">
						<img id="logo" src="graphics/logo.png" />
					</div>
					<div class="uk-navbar-right">
						<ul class="uk-navbar-nav uk-visible@m">
							<li><a href="#">Info</a></li>
							<li><a href="#">Mehr Info</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<div class="uk-container uk-container-expand">
			<h1>Events</h1>
		<?php
            $event_disabilty_relations_xml = simplexml_load_file('data/event_supports_disability.xml');
            $relation = $event_disabilty_relations_xml->xpath("//relation");
            $filter_is_active = false;
            if (isset($_GET["category"])) {
                $categoryId = $_GET["category"];
                $filter_is_active = true;
                $supported_events = get_events_by_disability($categoryId, $event_disabilty_relations_xml);
            }
        ?>
		<div>
				<table class="uk-table uk-table-divider">
					<tr>
						<th>Name</th>
						<th>Datum</th>
						<th>Ort</th>
						<th>Ausgelegt für [id]</th>
						<th>Teilnehmer</th>
						<th>Bestellen</th>
					</tr>
					<thead></thead>
					<tbody id="events">
            <?php
            
            $events_xml = simplexml_load_file('data/events.xml');
            $events = $events_xml->xpath("//event");
     
            
            foreach ($events as $event) {             
                 $event_id =  (String) $event["id"];
                 if ($filter_is_active && !in_array($event_id, $supported_events)){              
                    continue;
                }
                $name = $event->name;
                $start = $event->date_beginning;
                $end = $event->date_end;
                $location = $event->location;
                $participation_fee = $event->participation_fee;
                $max_participants = $event->max_participants;
                $supported_disabilites = get_disabilities_by_event($event["id"], $event_disabilty_relations_xml);
                $categoryId = $event["id"];
                $row = "<tr>";
                $row .= "<td>" . $name . "</td>";
                $row .= "<td>" . formateDate($start) . " &ndash;<br/>" . formateDate($end) . "</td>";
                $row .= "<td>" . $location . "</td>";
                $row .= "<td>" . $supported_disabilites . "</td>";
                $row .= "<td>?/" . $max_participants . "</td>";
                $row .= "<td><button class=\"uk-button uk-button-primary\">Anmelden</button></td>";
                $row .= "</tr>";
                print $row;
            }
            ?>
			</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>
