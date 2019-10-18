<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $pagetitle; ?></title>
</head>
<body>
	<header>
		<h1>Ceci est un header</h1>
	</header>
	<?php
	// Si $controleur='voiture' et $view='list',
	// alors $filepath="/chemin_du_site/view/voiture/list.php"
	$filepath = File::build_path(array("view", $controller, "$view.php"));
	require $filepath;
	?>
	<footer>
		<h1>Ceci est un footer</h1>		
	</footer>
</body>
</html>