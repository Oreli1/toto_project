<?php if (!empty($errorList)) : ?>
  <?php foreach($errorList as $key=>$value){ ?>
    <p><?php echo $value; ?></p>
  <?php } ?>
  <?php endif ?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="Password1" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <label for="exampleInputPassword1">Confirmez votre Password</label>
    <input type="password" name="Password2" class="form-control" id="exampleInputPassword2" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
