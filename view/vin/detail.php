<?php
	$immat_html = htmlspecialchars($v->getImmatriculation());
	$marque_html = htmlspecialchars($v->getMarque());
	$coul_html = htmlspecialchars($v->getCouleur());
    echo '<p> Voiture ' . ($immat_html) . ' de marque ' . htmlspecialchars($marque_html) . ' (couleur ' . htmlspecialchars($coul_html) . ') </p>';
?>