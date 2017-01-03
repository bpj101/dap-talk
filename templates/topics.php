<?php include('includes/header.php'); ?>
<ul id="topics">
    <?php if ($topics) : ?>
    <?php foreach ($topics as $topic) : ?>
  <li class="topic">
    <div class="row">
      <div class="col-md-2">
        <img src="<?php echo BASE_URI; ?>img/avatars/<?php echo $topic->avatar ?>" alt="User's Avatar" class="avatar pull-left">
      </div>
      <div class="col-md-10">
        <div class="topic-content pull-right">
          <h3><a href="<?php echo BASE_URI; ?>topic.php?id=<?php echo urlFormat($topic->id); ?>"><?php echo $topic->title;?></a></h3>
          <div class="topic-info">
            <a href="topics.php?category=<?php echo urlFormat($topic->category_id); ?>">
            <?php echo $topic->name;?></a> ➤➤
            <a href="topics.php?user=<?php echo urlFormat($topic->user_id); ?>"><?php echo $topic->username;?></a> ➤➤
            <span>Posted: <?php echo formateDate($topic->create_date);?></span>
            <span class="badge pull-right"><?php echo replyCount($topic->id);?> Replies</span>
          </div>
        </div>
      </div>
    </div>
  </li>
    <?php endforeach ?>
</ul>
<?php else : ?>
<p>No Topics to Display</p>
<?php endif ?>
<?php include('includes/footer.php'); ?>
