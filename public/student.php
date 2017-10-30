
<?php

require_once __DIR__.'/../inc/config.php';
//print_r($_GET);

$sql='
  SELECT *
  FROM student
  LEFT OUTER JOIN city
  ON student.city_cit_id = cit_id
  LEFT OUTER JOIN session
  ON student.session_ses_id = ses_id
  LEFT OUTER JOIN training
  ON session.training_tra_id = tra_id
  WHERE stu_id='.$_GET['id'];

$pdoStatement = $pdo->prepare($sql);
$retour = $pdoStatement->execute();
$resList = $pdoStatement->fetch(PDO::FETCH_ASSOC);
//print_r($resList);

$birth = new DateTime($resList['stu_birthdate']);
$now = new DateTime();
$age = $now->diff($birth)->y;




require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/student.php';
require_once __DIR__.'/../view/footer.php';
?>
<
