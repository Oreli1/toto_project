<form action="add.php" method="post">
	  <label for="">Nom</label>
    <br>
  	<input type="text" name="lastname" placeholder="nom de l'apprenant"/>
  	<br>
    <label for="">Prénom</label>
    <br>
  	<input type="text" name="firstname" placeholder="prenom de l'apprenant"/>
  	<br>
    <label for="">Email</label>
    <br>
  	<input type="mail" name="email" placeholder="email@etudiant.wf"/>
  	<br>
    <label for="">Date de naissance</label>
    <br>
  	<input type="text" name="birthdate" placeholder="Date de naissance"/>
    <br>
    <span>au format YYYY-MM-DD <?php echo date('Y-m-d',time())?></span>
  	<br>
    <label for="">Sympathie</label>
    <br>
  	<input type="text" name="friendliness" placeholder="Sympathie"/>
  	<br>
    <label for="">Session</label>
    <br>
  	<select class="" name="Session">
  	  <option selected>Choisissez</option>
      <?php foreach ($session as $key => $value): ?>
        <option value="<?= $value['ses_id'] ?>"><?php echo $session[$key]['ses_id'].' - '.$session[$key]['tra_name'].' du '.$session[$key]['ses_start_date'].' au '.$session[$key]['ses_end_date'] ?></option>
      <?php endforeach; ?>
  	</select>
  	<br>
    <label for="">Ville</label>
    <br>
  	<select class="" name="Ville">
      <option selected>Choisissez</option>
      <?php foreach ($city as $key => $value): ?>
        <option value="<?= $value['cit_id'] ?>"><?php echo $city[$key]['cit_name'] ?></option>
      <?php endforeach; ?>
  	</select>
  	<br>

  	<button type="submit">Envoyer</button>
</form>
