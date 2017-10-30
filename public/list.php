<?php

require_once __DIR__.'/../inc/config.php';

$step=5;

if(isset($_GET['page'])){
  $offset = $_GET['page'];
}else{
  $offset = 1;
}

$sql='
  SELECT *
  FROM student
  LIMIT '.$step.' OFFSET '.($offset-1)*$step;
  $pdoStatement = $pdo->prepare($sql);
  $retour = $pdoStatement->execute();
  $resList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
  //print_r ($resList);

  // Si erreur dans la requête
  if ($pdoStatement === false) {
    print_r($pdo->errorInfo());
    exit;
  }

//A la fin, j'affiche
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';

?>
