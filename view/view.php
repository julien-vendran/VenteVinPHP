<!DOCTYPE html>
<html>
<head>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="./view/style.css" type="text/css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Vente de vins</title>
</head>
<body>
<header>
    <?php require File::build_path(array('view', 'header.php'));?>
</header>
<main>
    <?php
    $filepath = File::build_path(array("view", $controller, "$view.php"));
    require $filepath;
    ?>
</main>
<footer>
    <div>
        © 2019 Copyright caveau-online.fr
    </div>
</footer>
</body>
</html>