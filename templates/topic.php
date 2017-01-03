<?php include('includes/header.php'); ?>
<ul class="topics">
  <!-- Main Topic -->
  <li id="main-topic" class="topic">
    <div class="row">
      <div class="col-md-2">
        <div class="user-info">
          <img src="<?php echo BASE_URI; ?>img/avatars/<?php echo $topic->avatar; ?>" alt="" class="avatar pull-left" />
          <ul>
            <li><strong><?php echo $topic->username; ?></strong></li>
            <!-- Add Get Total Posts & Build Profile Template -->
            <li>43 Posts</li>
            <li><a href="profile.php?user=<?php echo urlFormat($topic->user_id); ?>">Profile</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-10">
        <div class="topic-content pull-right">
          <p><?php echo $topic->body; ?></p>
        </div>
      </div>
    </div>
  </li>
  <!-- All Replies To Topic -->
    <?php if ($replies <> null) : ?>
    <?php foreach ($replies as $reply) : ?>
    <li class="topic pull-right">
      <div class="row">
        <div class="col-md-2">
          <div class="user-info">
            <img src="<?php echo BASE_URI; ?>img/avatars/<?php echo $reply->avatar; ?>" alt="" class="avatar pull-left" />
            <ul>
              <li><strong><?php echo $reply->username; ?></strong></li>
              <!-- Add Get Total Posts & Build Profile Template -->
              <li>43 Posts</li>
              <li><a href="profile.php?user=<?php echo urlFormat($reply->user_id); ?>">Profile</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-10">
          <div class="topic-content pull-right">
            <p><?php echo $reply->body; ?></p>
          </div>
        </div>
      </div>
    </li>
    <?php endforeach ?>
    <?php endif ?>
</ul>
<div class="clearfix"></div>
<form role="form">
  <div class="form-group">
    <textarea name="reply" id="reply" cols="80" rows="10" class="from-control"></textarea>
    <script>
    CKEDITOR.replace('reply');
    </script>
  </div>
  <button class="btn btn-default" type="submit">Submit</button>
</form>
<?php include('includes/footer.php'); ?>
