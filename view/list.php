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
        <td><a class="btn btn-primary btnStudentDetails" data-id="<?php echo $value['stu_id'] ?>" href="<?php echo 'student.php?id=' . $value['stu_id'] ?>" role="button">fiche</a></th>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a href=" <?=  'list.php?page=' .(($offset>=2) ? 1 : ($offset-1))?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Précédent</a>
<a href=" <?= 'list.php?page=' .($offset+1)?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Suivant</a>

<script type="text/javascript">
$('.btnStudentDetails').on('click', function(e){
  e.preventDefault();
  console.log('click');
  var studentId = $(this).data('id');
  console.log(studentId);
  $.ajax({
  type : 'get',
  url : '../public/ajax/student.php',
  data : {
    id : studentId
  }
  }).done(function(html){
    $('#popupStudent').html('<div class="close-window" role="button"><i class="fa fa-times" aria-hidden="true"></i></div>');
    $('#popupStudent').append(html);
    $('#popupStudent').css('display','block');
    $('.close-window').on('click', function(){
      //console.log('intercept button')
      $('#popupStudent').css('display','none');
    })
  }).fail(function(){
    //lorsque la requête est en erreur, afficher une alerte : "bad news... ERROR !"
    alert("bad news... ERROR !");
  });
});


</script>

<div id="popupStudent" style="display:none;position:absolute;z-index:1000;left:50%;top:10%;margin-left:-200px;width:400px;border:1px solid black;padding:10px;background: white;">
</div>
