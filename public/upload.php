<!--<pre>-->
<?php
require_once __DIR__.'/../inc/config.php';

if(!empty($_POST)) {

	//print_r($_POST);

	//print_r($_FILES);
  if(isset($_POST['fileForm'])){
  	if(!empty($_FILES)){
  		$fileForm = isset($_FILES['fileForm']) ? $_FILES['fileForm'] : array();

  		$formOk=true;
  		$allowedExtensions = array('csv');

  		if ($fileForm['type'] != 'application/octet-stream') {
  			echo 'Fichier incorrect <br>';
  			$formOk = false;
  		}

  		$dotPostion = strrpos($fileForm['name'],'.');

  		$extension = substr($fileForm['name'], $dotPostion+1);

  		if(!in_array($extension, $allowedExtensions)){
  			echo 'extension incorrect <br>';
  			$formOk = false;
  		}

  		if($formOk) {

        $newFilename = uniqid().'projet-toto-wf3'.'.'.$extension;

  			if(move_uploaded_file($fileForm['tmp_name'],__DIR__.'/csv/'.$newFilename)){
  				//echo'upload OK <br>';
          $allDatas = array(
            'lastName' => array(),
            'firstName' => array(),
            'email' => array(),
            'friendliness' => array(),
            'birthDate' => array(),
          );
          $k=0;
          $handle = fopen('C:\xampp\htdocs\toto_project\public\csv\\'.$newFilename,'r');
          if(!empty($handle)){
            while (!feof($handle)) {
              $currLine = fgets($handle);
              $data = explode(';',$currLine);
              $allDatas['lastName'][$k]=$data[0];
              $allDatas['firstName'][$k]=$data[1];
              $allDatas['email'][$k]=$data[2];
              $allDatas['friendliness'][$k]=$data[3];
              $allDatas['birthDate'][$k]=$data[4];
              $k++;
            }
          fclose($handle);
          $sql='
          INSERT INTO student (stu_lastname, stu_firstname,stu_email,stu_birthdate,stu_friendliness)
          VALUES (:lastname, :firstname, :email, :birthdate, :friendliness)
          ';
          $pdoStatement = $pdo->prepare($sql);
          }
          $i=0;

          while ($i<$k) {
            $pdoStatement->bindValue(':lastname', $allDatas['lastName'][$i], PDO::PARAM_STR);
            $pdoStatement->bindValue(':firstname', $allDatas['firstName'][$i], PDO::PARAM_STR);
            $pdoStatement->bindValue(':email', $allDatas['email'][$i], PDO::PARAM_STR);
            $pdoStatement->bindValue(':birthdate', $allDatas['birthDate'][$i], PDO::PARAM_STR);
            $pdoStatement->bindValue(':friendliness', $allDatas['friendliness'][$i], PDO::PARAM_INT);
            $pdoStatement->execute();
            $i++;
          }
  			}else{
  				echo 'error:( <br>';
  			}
  		}
  	}
  }else if(isset($_POST['genForm']) && $_POST['genForm']){
    $sql='
    SELECT stu_lastname, stu_firstname,stu_email,stu_birthdate,stu_friendliness
    FROM student
    ';
    $pdoStatement = $pdo->query($sql);
    if($pdoStatement && $pdoStatement->rowCount() >0){
      $handle = fopen('./export/export-'.date('Ymd').'.csv','w');
      while(($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)) !== false){
        //print_r($row);
        $line= implode(';',$row);
        fwrite($handle, $line.PHP_EOL);
        //print_pre($row);
      }
    fclose($handle);
    echo "export ok";
    }
  }else{
    echo "ERROR";
  }
}


require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/upload.php';
require_once __DIR__.'/../view/footer.php';
?>
<!--</pre>-->
