<?php
require_once File::build_path(array('model', 'Model.php'));
class ModelVoiture {
	private $marque;
	private $couleur;
	private $immatriculation;
	      
	// un getter      
	public function getMarque() {
	   return $this->marque;  
	}
	 
	// un setter 
	public function setMarque($marque2) {
	   $this->marque = $marque2;
	}

	public function getCouleur() {
		return $this->couleur;
	}

	public function setCouleur($couleur2){
		$this->couleur = $couleur2;
	}

	public function getImmatriculation() {
		return $this->immatriculation;
	}

	public function setImmatriculation($immat){
		if (strlen($immat) <= 8) {
			$this->immatriculation = $immat;
		}
		else {
			echo "La plaque d'immatriculation contient plus de 8 caractères";
		} 
	}

	public function __construct($m = NULL, $c = NULL, $i = NULL) {
  if (!is_null($m) && !is_null($c) && !is_null($i)) {
    // Si aucun de $m, $c et $i sont nuls,
    // c'est forcement qu'on les a fournis
    // donc on retombe sur le constructeur à 3 arguments
    $this->marque = $m;
    $this->couleur = $c;
    $this->immatriculation = $i;
  }
}
	       
	// une methode d'affichage. 
	// public function afficher() {
	// 	echo "<p> Voiture $this->immatriculation de marque $this->marque (couleur $this->couleur) </p>";
	// }
	
	//Afficher toutes les voitures 
	public static function getAllVoitures() {
		$rep = Model::$pdo->query('SELECT * FROM Voiture');
		$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
		return $rep->fetchAll();
	}

	//Requêtes préparées 
	public static function getVoitureByImmat($immat) {
		$sql = "SELECT * FROM Voiture WHERE immatriculation=:nom_tag";
		$req_prep = Model::$pdo->prepare($sql);
		
		$tab_values = array("nom_tag" => $immat,);
		$req_prep->execute($tab_values);
		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
		$tab_voit = $req_prep->fetchAll();
		if (empty($tab_voit[0]))
			return false;
		return $tab_voit[0];
	}
        
        //Sauvegarder une voiture dans la BDD
        public function save() {
        	try {

        		$sql = "INSERT INTO Voiture (immatriculation, marque, couleur) VALUES (:immatriculation, :marque, :couleur);";
        		$req_prep = Model::$pdo->prepare($sql);
        		$tab_values = array(
        			"immatriculation" => $this->immatriculation,
        			"marque" => $this->marque,
        			"couleur" => $this->couleur,
        		);
        		$req_prep->execute($tab_values);
	            // $sql = "INSERT INTO Voiture (immatriculation, marque, couleur) VALUES ('$this->immatriculation', '$this->marque', '$this->couleur')";
        	} catch (PDOException $e) {
        		echo "<p>La voiture n'a pas pu être enregistrée désolé</p>";
        		return false;
        	}
        	return true;
        }

        public static function delete($immat) {
        	try {
        		$sql = "DELETE FROM `Voiture` WHERE `Voiture`.immatriculation =:immat;";
        		$req_prep = Model::$pdo->prepare($sql);
        		$tab_values = array (
        			"immat" => $immat,
        		);
        		$req_prep->execute($tab_values);
        	} catch (PDOException $e) {
        		echo "<p>Cette voiture n'existe pas</p>";
        		return false;
        	}
        	return true;

    //     	try {
				// $sql = "DELETE FROM `Voiture` WHERE `Voiture`.immatriculation = ".$immat.";";
				// echo "Requete : ".$sql;
    //     		Model::$pdo->query($sql);
    //     	} catch (PDOException $e) {
    //     		echo "<p>Cette voiture n'existe pas</p>";
    //     		return false;
    //     	}
    //     	return true;
        }
}
?>