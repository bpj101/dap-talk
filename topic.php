<?php require 'core/init.php'; ?>

<?php

// Get Topic Object
$topic = new Topic();

// $_GET category from URL variable
$topic_id = isset($_GET['id']) ? $_GET['id'] : null;

// Get Template & Assign Vars
$template = new Template('templates/topic.php');

/*----------  Assign Variables  ----------*/
$template->title = 'How did you learn CSS & HTML';

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalTopicsByCategory = $topic->countTopicsByCagegory();

// Single Topic And Replies
if ($topic_id) {
    $tmpResults = $topic->getSingle($topic_id);
    // print_r($tmpResults);
    // die();
    $template->topic = $tmpResults[0][0];

    if (count($tmpResults[1]) > 0) {
        $template->replies = $tmpResults[1];
    } else {
        $template->replies = null;
    }
    // print_r($template->topic);
    // print_r($template->replies);
    // die();
}

/*----------  Display Template  ----------*/
echo $template;

