<div id="bandeau">
    <img src="./view/images/bandeau.png" alt="logo">
</div>
<nav>
    <div id="menu" class="nav-wrapper">
        <ul id="nav-mobile" class="hide-on-med-and-down">
            <li><a href="?action=readAllVins">Boutique</a></li>
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="?action=readAllDomaines">Domaines</a></li>
            <?php
                if (!Session::est_Connecte())
                    echo '<li><a href="?action=connectUser">Se Connecter</a></li>';
                else
                    echo '<li><a href="?action=deconnectUser">Se Deconnecter</a></li>';
            ?>
        </ul>
    </div>
</nav>