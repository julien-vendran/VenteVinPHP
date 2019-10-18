<form method="post" action="?action=created">
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
          
          <label for="immat_id">Immatriculation</label> :
          <input type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" required/><br>
          
          <label for="marque_id">Marque</label> :
          <input type="text" placeholder="Ex : Jamborgini" name="marque" id="marque_id" required/><br>
          
          <label for="coul_id">Couleur</label> :
          <input type="text" placeholder="Ex : Jone" name="couleur" id="coul_id" required/>
      </p>
      <p>
          <input type="submit" value="Envoyer"/>
      </p>
  </fieldset> 
</form>