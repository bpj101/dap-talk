<?php include('includes/header.php'); ?>
<form role="form" enctype="multipart/form-data" method="post" action="register.php">
  <div class="form-group">
    <label>Name*</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Your Name">
  </div>
  <div class="form-group">
    <label>Email Address*</label>
    <input name="email" type="email" class="form-control" placeholder="Enter Your Email Address">
  </div>
  <div class="form-group">
    <label>Username*</label>
    <input name="username" type="text" class="form-control" placeholder="Enter A username">
  </div>
  <div class="form-group">
    <label>Password*</label>
    <input name="password" type="password" class="form-control" placeholder="Enter A Password">
  </div>
  <div class="form-group">
    <label>Confirm Password*</label>
    <input name="password2" type="password" class="form-control" placeholder="Re-enter Password">
  </div>
  <div class="form-group">
    <label>Upload Avatar</label>
    <input type="file" name="avatar">
    <p class="help-block"></p>
  </div>
  <div class="form-group">
    <label>About Me</label>
    <textarea id="about" rows="6" cols="80" name="about" type="text" class="form-control" placeholder="Tell Us About You (Optional)"></textarea>
  </div>
  <p class="pull-right">*Required Fields</p>
  <input name="register" type="submit" class="btn btn-default" value="Register">
</form>
<?php include('includes/footer.php'); ?>
