<?php require 'core/init.php'; ?>

<?php
// Get Topic Object
$topic = new Topic();

// $_GET category from URL variable
$category_id = isset($_GET['category']) ? $_GET['category'] : null;

// Get Template & Assign Vars
$template = new Template('templates/topics.php');

/*----------  Get Topics By Category  ----------*/
if ($category_id) {
    $template->topics = $topic->getByCategory($category_id);
    $template->title = 'Posts In "'.$topic->getByCategory($category_id)[0]->name.'"';
} else {
    $template->topics = $topic->getAllTopics();
}
/*----------  Assign Template Variables  ----------*/
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalTopicsByCategory = $topic->countTopicsByCagegory();




/*----------  Display Template  ----------*/
echo $template;
