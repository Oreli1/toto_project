<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="http://freevector.co/wp-content/uploads/2009/03/10872-graduate-student1.png" alt="Card image cap" style="width: 5rem;">
  <div class="card-body">
    <h4 class="card-title"><?php echo $resList['stu_id'].' '.$resList['stu_lastname'] ?> </h4>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Nom : <?php echo $resList['stu_lastname'] ?></li>
    <li class="list-group-item">Prénom : <?php echo $resList['stu_firstname'] ?></li>
    <li class="list-group-item">email : <?php echo $resList['stu_email'] ?></li>
    <li class="list-group-item">Date de naissance : <?php echo $resList['stu_birthdate'] ?></li>
    <li class="list-group-item">Age : <?php echo ($age) ?></li>
    <li class="list-group-item">Ville : <?php echo $resList['cit_name'] ?></li>
    <li class="list-group-item">sympathie : <?php echo $resList['stu_friendliness'] ?></li>
    <li class="list-group-item">Numéro de session : <?php echo $resList['ses_id'] ?></li>
    <li class="list-group-item">Nom de session: <?php echo $resList['tra_name'] ?></li>
  </ul>
</div>
