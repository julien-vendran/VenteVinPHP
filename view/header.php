<div id="bandeau">
    <img src="./view/images/bandeau.png" alt="logo">
</div>
<nav>
    <div id="menu" class="nav-wrapper">
        <ul id="nav-mobile" class="hide-on-med-and-down">
            <li><a href="?action=readPanier"><i class="material-icons">shopping_cart</i></a></li>
            <?php
                if (Session::est_Connecte()) {
                    echo '<li><a href="index.php">Accueil</a></li>';
                }
            ?>
            <li><a href="?action=readAllVins">Boutique</a></li>
            <?php
                if (!Session::est_Connecte())
                    echo '<li><a href="?action=connectUser">Se Connecter</a></li>';
                else {
                    echo '<li><a href="?action=deconnectUser">Se Deconnecter</a></li>';
                    echo '<li><a href="?action=detail"><i class="material-icons">account_circle</i></a>';
                }

                if (Session::est_viticuleur())
                    echo '<li><a href="?action=adminPanelViticulteur">Panneau viticulteur</a></li>';

                if (Session::est_administrateur())
                    echo "<li><a href='?action=adminPanelAdministrateur'>Panneau administrateur</a></li>";
            ?>
        </ul>
    </div>
</nav>