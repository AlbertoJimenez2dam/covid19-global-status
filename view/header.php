
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="ISO-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>COVID-19 global status</title>
	<meta name="theme-color" content="#161644">
	<link rel="shortcut icon" href="view/img/covid_icon.png" type="image/png">
	<link rel="stylesheet" href="view/css/style.css">
</head>
<body>
	<section>
		<header>
            COVID-19 global status
		</header>
		Statistics about current and total COVID-19 levels around the world.<br>
		Data from <a href="https://covid-19.dataflowkit.com/" target="_blank">DataflowKit</a>.<br><br>
		<a href="https://github.com/AlbertoJimenez2dam/covid19-global-status" target="_blank">Source code (GitHub)</a>
		<br><br>
		<form method="get" action="" id="form">
            <select name="country">
				<?php
					foreach($countries as $thisCountry) {
						echo '<option value="' . $thisCountry -> getCountry() . '"';
						
						if (isset($currentCountry)) {
							if ($currentCountry == $thisCountry -> getCountry()) {
								echo ' selected="selected"';
							}
						}
						
						echo '>' . $thisCountry -> getCountry() . '</option>';
					}
				?>
            </select>
                <input type="submit" value="Get data">
        </form>
        