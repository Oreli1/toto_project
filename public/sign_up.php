<!--<pre>-->
<?php
require_once __DIR__.'/../inc/config.php';

//Initialisation des données
$Password1 = '';
$Password2 = '';
$userOk=0;
$errorList = array();

// Si formulaire soumis
if (isset($_POST['email'],$_POST['Password1'],$_POST['Password2'])) {
	//print_r($_POST);

  //récupération des données

  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $Password1 = isset($_POST['Password1']) ? $_POST['Password1'] : '';
  $Password2 = isset($_POST['Password2']) ? $_POST['Password2'] : '';


  // Traiter les données
  $email = trim(strip_tags($_POST['email']));// retire les espaces au debut et à la fin


  // Validation des données
  $formOk = true;

  if (empty($email)) {
    $errorList[] = 'email vide<br>';
    $formOk = false;
  }

  if (empty($Password1)) {
    $errorList[] = 'passeword1 vide<br>';
    $formOk = false;
  }
  else if (strlen($Password1) < 6) {
    $errorList[] = 'password1 trop court<br>';
    $formOk = false;
  }

  if (empty($Password2)) {
    $errorList[] ='passeword2 vide<br>';
    $formOk = false;
  }
  else if (strlen($Password2) < 6) {
    $errorList[] = 'password2 trop court<br>';
    $formOk = false;
  }
  if($Password1 != $Password2){
    $errorList[] = 'les mots de passes doivent être identique <br>';
    $formOk = false;
  }
  if ($formOk) {
    //requête pour adresse mail
    $sql='
    SELECT usr_email
    FROM users
    WHERE usr_email = :email
    ';
    //var_dump($email);
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
    $pdoStatement->execute();
    $results=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($results);
    //exit;
    if(empty($results)){
      // requête pour formulaire ok
      $sql='
      INSERT INTO users (`usr_email`,`usr_password`,usr_role)
      VALUES (:email, :password, "user")
      ';

      //clef de cryptage
      //$key= 'ckrypT';

      $pdoStatement = $pdo->prepare($sql);

      //crypter le mot de passe
      $crypt = password_hash($Password1, PASSWORD_BCRYPT);

      $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
      $pdoStatement->bindValue(':password',$crypt, PDO::PARAM_STR);
      if ($pdoStatement->execute() === false) {
        print_r($pdoStatement->errorInfo());
        exit;
        $userOk=1;
        echo 'formulaire OK';
      }
    }else{
      $errorList[]='Email existe déja';
    }
  }
}

require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/sign_up.php';
require_once __DIR__.'/../view/footer.php';
?>
<!--</pre>-->
