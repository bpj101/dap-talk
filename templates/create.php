<?php
include 'includes/header.php'; ?>
<form role="form" method="post" action="create.php">
  <div class="form-group">
    <label>Topic Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Post Title"/>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control" placeholder="Select One">
      <option value="" disabled selected style="color: #9f9999">Select A Category</option>
        <?php foreach (getCategories() as $category) : ?>
        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
        <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Topic Body</label>
    <textarea id="body" rows="10" cols="80" name="body" type="text" class="form-control" placeholder="Topic"></textarea>
    <script>
    CKEDITOR.replace('body');
    </script>
  </div>
  <button name="do_create" type="submit" class="btn btn-default">Submit</button>
</form>
<?php include 'includes/footer.php'; ?>
