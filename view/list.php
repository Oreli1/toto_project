<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Last Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Email</th>
      <th scope="col">Birthdate</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resList as $key => $value) :?>
      <tr>
        <td><?php echo $value['stu_id'] ?></td>
        <td><?php echo $value['stu_lastname'] ?></td>
        <td><?php echo $value['stu_firstname'] ?></td>
        <td><?php echo $value['stu_email'] ?></td>
        <td><?php echo $value['stu_birthdate'] ?></td>
        <td><a class="btn btn-primary" href="<?php echo 'student.php?id=' . $value['stu_id'] ?>" role="button">fiche</a></th>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a href=" <?=  'list.php?page=' .(($offset>=2) ? 1 : ($offset-1))?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Précédent</a>
<a href=" <?= 'list.php?page=' .($offset+1)?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Suivant</a>
