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
							<li><a href="#">Mehr Infos</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<div class="uk-container uk-container-expand">
			<h1>Willkommen</h1>
			<p>
			Behindertensport ist ....
			</p>
			<p>
             <a class="uk-button uk-button-default" href="events.php">Alle Events</a>
             </p>
             <h2>Unsere Veranstaltungen</h2>
			<?php display_disabilites(); ?>
              
                
		</div>
	</div>

</body>
</html>
