<?php
include('includes/header.php'); ?>
<form role="form" method="post" action="topic.html">
  <div class="form-group">
    <label>Topic Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Post Title"/>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control" placeholder="Select One">
      <option value="" disabled selected>Select A Category</option>
      <option>Design</option>
      <option>Development</option>
      <option>Business & Marketing</option>
      <option>Search Engines</option>
      <option>Cloud & Hosting</option>
    </select>
  </div>
  <div class="form-group">
    <label>Topic Body</label>
    <textarea id="body" rows="10" cols="80" name="body" type="text" class="form-control" placeholder="Topic"></textarea>
    <script>
    CKEDITOR.replace('body');
    </script>
  </div>
  <button name="register" type="submit" class="btn btn-default">Submit</button>
</form>
<?php include('includes/footer.php'); ?>
