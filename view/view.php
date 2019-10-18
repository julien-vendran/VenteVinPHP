<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
         <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <header>
            <nav>
                <?php echo '<a href="index.php?action=readAll">Voitures</a>' ?>
                <?php echo '<a href="index.php?action=readAll&controller=utilisateur">Utilisateurs</a>' ?>
                <?php echo '<a href="index.php?action=readAll&controller=trajet">Trajets</a>' ?>
            </nav>
        </header>
        <div>
            <?php
            // Si $controleur='voiture' et $view='list',
            // alors $filepath="/chemin_du_site/view/voiture/list.php"
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
            ?>
        </div>
        <footer>
            <p>
                Site de covoiturage de Mathis Goichon.
            </p>
        </footer>
    </body>
</html>

<style type="text/css">
    html, body {
        height: 100%;
        padding: 0;
        margin: 0;
        font-family: 'Roboto', sans-serif;
    }
    body {
        display: flex;
        flex-direction: column;
        margin-left: auto;
    }
    body > div{
        margin-left: 10%;
        width: 80%;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 20px;
    }
    body > div a{
        text-decoration: none;
        color: #424242;
    }
    nav{
        display: flex;
        flex-direction: row;
        justify-content: center;    
        align-items: center;
        font-size: 30px;
        height: 50px;
        background-color: lightyellow;
        border-bottom: 0.5px solid black;
        margin-bottom: 30px;
        padding: 10px;
    }
    nav > a{
        text-decoration: none;
        color: black;
    }
    nav > a:nth-child(2), nav > a:nth-child(3){
        margin-left: 5%;
    }
    fieldset > p:last-child{
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    #create{
        margin-top: 30px;
        text-decoration: none;
        color: #424242;
    }
    footer{
        display: flex;
        flex-direction: row;
        justify-content: center;
        margin-top: auto;
    }
    footer > p{
        margin: 0;
        font-size: 20px;
        padding: 20px;
    }
</style>