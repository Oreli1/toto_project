<!--<pre>-->
<?php
require_once __DIR__.'/../inc/config.php';

//Initialisation des données
$Password1 = '';
$Password2 = '';
$userOk=0;
$errorList = array();
$idIp = '';

// Si formulaire soumis
if (isset($_POST['mail'],$_POST['Password'])) {
	//print_r($_POST);

  //récupération des données

  $email = isset($_POST['mail']) ? $_POST['mail'] : '';
  $Password = isset($_POST['Password']) ? $_POST['Password'] : '';



  // Traiter les données
  $email = trim(strip_tags($_POST['mail']));// retire les espaces au debut et à la fin


  // Validation des données
  $formOk = true;

  if (empty($email)) {
    $errorList[] = 'email vide<br>';
    $formOk = false;
  }

  if (empty($Password)) {
    $errorList[] = 'passeword vide<br>';
    $formOk = false;
  }
  else if (strlen($Password) < 6) {
    $errorList[] = 'password trop court<br>';
    $formOk = false;
  }
  if ($formOk) {
    //requête pour adresse mail
    $sql='
    SELECT usr_id
    FROM users
    WHERE usr_email = :email
    ';
    //var_dump($email);
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
    $pdoStatement->execute();
    $results1=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($results);
    //exit;
  }if(!empty($results1)){
    $sql='
    SELECT usr_password, usr_role
    FROM users
    WHERE usr_id = :id
    ';

    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->bindValue(':id', $results1[0]['usr_id'], PDO::PARAM_INT);
    $pdoStatement->execute();
    $results2=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($results);
    //exit;
    $ip_address = $_SERVER['REMOTE_ADDR'];
    //echo ($ip_address);
    $idIp = 'Voici l\'id '.$results1[0]['usr_id'].' et l\'adresse ip '.$ip_address;
    //print_r($_SESSION);
    $Id = $results1[0]['usr_id'];
    $_SESSION['Id'] =   $Id;
    $_SESSION['role'] =$results2[0]['usr_role'];
  }else{
    $errorList[] = 'erreur email non reconnu';
  }
}

require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/sign_in.php';
require_once __DIR__.'/../view/footer.php';
?>
<!--</pre>-->
