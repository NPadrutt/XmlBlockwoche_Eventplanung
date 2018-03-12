<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>XML-Sporthalle</title>
<script type="text/javascript" src="assets/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/uikit/js/uikit.min.js"></script>
<link rel="stylesheet" href="assets/uikit/css/uikit.min.css"/>
<link rel="stylesheet" href="assets/css/style.css"/>
<meta charset="utf-8"/>
<meta name="keywords" content="Behindertensport Schweiz" />
<meta name="description" content="Sport hält Körper und Geist fit, bringt Menschen zusammen und erweitert Horizonte. Wir engagieren uns dafür, dass dies für so viele Menschen wie möglich zur Verfügung steht."/>

</head>
<body>
<?php 
$scriptname = basename($_SERVER["SCRIPT_FILENAME"], '.php');
$page = "home";

switch($scriptname){
    case "application":
            $page = "events";
            break;
    case "confirmation":
            $page = "events";
            break;
    case "events":
            $page ="events";
            break;
    case "links":
        $page ="links";
        break;
    case "contact":
        $page ="contact";
        break;
    default:
        $page = "home";
}
?>

	<div class="uk-offcanvas-content">
		<div class="uk-navbar-container tm-navbar-container" id="topnav">
			<div class="uk-container uk-container-large">
				<nav class="uk-navbar">
					<div class="uk-navbar-left"></div>
					<div class="uk-navbar-left">
						<ul class="uk-navbar-nav">
							<li><a href="index.php"> <img id="logo" src="graphics/logo.png"
									style="padding-top: 0px;" alt="Logo XML Sporthalle"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
							</a></li>
							<li <?php if ($page == "home"){echo "class='active'";}?> ><a href="index.php"> Startseite
							</a></li>
							<li <?php if ($page == "events"){echo "class='active'";}?> ><a href="events.php">Veranstaltungen</a></li>
						</ul>
					</div>
					<div class="uk-navbar-right">
						<ul class="uk-navbar-nav uk-visible@m">
							<li <?php if ($page == "links"){echo "class='active'";}?> ><a href="links.php">Links</a></li>
							<li <?php if ($page == "contact"){echo "class='active'";}?> ><a href="contact.php">Kontakt</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<div class="uk-container uk-container-large">