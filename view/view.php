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
                    <div id="bandeau">
                            <img src="./view/images/bandeau.png" alt="logo">
                    </div>
                    <nav>
                        <div id="menu" class="nav-wrapper">
                          <ul id="nav-mobile" class="hide-on-med-and-down">
                            <li><a href="badges.html">Actualité</a></li>
                            <li><a href="sass.html">Acceuil</a></li>
                            <li><a href="collapsible.html">Boutique</a></li>
                          </ul>
                        </div>
                    </nav>
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