</div>
</div>
</div>
<!--===================================
=            Side Bar Code            =
====================================-->
<div class="col-md-4">
<div class="sidebar">
<div class="block">
<h3>Login Form</h3>
<?php if (isLoggedIn()) : ?>
  <div class="userdata">
    Welcome, <?php echo getUser()['username']; ?>
  </div>
  <br>
  <form action="logout.php" role="form" method="post">
    <input type="submit" class="btn btn-primary" name="do_logout" value="Logout">
  </form>
<?php else : ?>
  <form role="form" method="post" action="login.php" autocomplete="off" >
  <div class="form-group">
    <label>Username</label>
    <input name="username" type="text" class="form-control" placeholder="Enter Username"/>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="password" type="password" class="form-control" placeholder="Password"/>
  </div>
  <button name="do_login" type="submit" class="btn btn-primary">Login</button>
  <a class="btn btn-default" href="register.html">Create An Account</a>
</form>
<?php endif ?>
</div>
<div class="block">
<h3>Categories</h3>
<div class="list-group">
  <a href="topics.php" class="list-group-item <?php echo is_active(null); ?>" >All Topics<span class="badge pull-right"><?php echo $totalTopics ?></span></a>
    <?php foreach (getCategories() as $category) : ?>
  <a href="topics.php?category=<?php echo $category->id; ?>" class="list-group-item <?php echo is_active($category->id); ?>"><?php echo $category->name; ?><span class="badge pull-right"></span></a>
    <?php endforeach; ?>
<!--====  End of Side Bar Code  ====-->

</div>
</div>
</div>
</div>
</div>
</div>
<!-- /.container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
