<?php

require_once __DIR__.'/../inc/config.php';

if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){


  $sql='
    SELECT tra_id,tra_name,ses_id, ses_start_date, ses_end_date
    FROM training
    INNER JOIN session
    ON tra_id = session.training_tra_id
    ORDER BY ses_id
    ';
  $pdoStatement = $pdo->prepare($sql);
  $pdoStatement -> execute();
  $session = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

  $sql='
    SELECT cit_name, cit_id
    FROM city
    ';
  $pdoStatement = $pdo->prepare($sql);
  $pdoStatement -> execute();
  $city = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);


  //Initialisation des données
  $firstname = '';
  $lastname = '';

  // Si formulaire soumis
  if (!empty($_POST)) {
  	//print_r($_POST);

    //récupération des données
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
    $friendliness = isset($_POST['friendliness']) ? $_POST['friendliness'] : '';
    $Session = isset($_POST['Session']) ? $_POST['Session'] : '';
    $Ville = isset($_POST['Ville']) ? $_POST['Ville'] : '';

    // Traiter les données
    $lastname = strtoupper(trim(strip_tags($lastname))); // retire les espaces au debut et à la fin
    $firstname = ucfirst(trim(strip_tags($firstname)));

    // Validation des données
    $formOk = true;
    if (empty($lastname)) {
      echo 'Nom vide<br>';
      $formOk = false;
    }
    else if (strlen($lastname) < 2) {
      echo 'Nom incorrect<br>';
      $formOk = false;
    }

    if (empty($firstname)) {
      echo 'Prénom vide<br>';
      $formOk = false;
    }
    else if (strlen($firstname) < 2) {
      echo 'Prénom incorrect<br>';
      $formOk = false;
    }
    if (empty($friendliness)) {
      echo 'Sympatoche vide<br>';
      $formOk = false;
    }
    else if (is_int($friendliness) && 0< $friendliness && $friendliness<6) {
      echo 'Choisir un niveau de sympatochitude entre 1 et 5<br>';
      $formOk = false;
    }
    if (empty($birthdate)) {
      echo 'Date vide<br>';
      $formOk = false;
    }
    else if (strlen($birthdate) < 10) {
      echo 'Date incorrect<br>';
      $formOk = false;
    }

    // Si aucune erreur
    if ($formOk) {
      $sql='
      INSERT INTO student (`stu_lastname`,`stu_firstname`,`stu_email`,`stu_birthdate`, `stu_friendliness`,`session_ses_id`,`city_cit_id`)
      VALUES (:lastname, :firstname, :email, :birthdate, :friendliness, :Session, :Ville)
      ';
      $pdoStatement = $pdo->prepare($sql);
      $pdoStatement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
      $pdoStatement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
      $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
      $pdoStatement->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
      $pdoStatement->bindValue(':friendliness', $friendliness, PDO::PARAM_INT);
      $pdoStatement->bindValue(':Session', $Session, PDO::PARAM_INT);
      $pdoStatement->bindValue(':Ville', $Ville, PDO::PARAM_INT);
      if ($pdoStatement->execute() === false) {
      	print_r($pdoStatement->errorInfo());
      	exit;
      }
      $newId = $pdo->lastInsertId();
      header('Location: student.php?id='.$newId);
      exit;
    }else{
      die('c bon');
    }
  }
} else {
  header("Location: 404.php");
}

//A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/add.php';
require_once __DIR__.'/../view/footer.php';
