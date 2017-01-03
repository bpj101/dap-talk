<?php require 'core/init.php'; ?>

<?php
// Get Topic Object
$topic = new Topic();
// Get Template Object & Assign Template Variables
$template = new Template('templates/frontpage.php');

// Get User Object
$user = new User();

/*----------  Assign Template Variables  ----------*/

$template->title = 'Welcome to DAP Talking Space';
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();

/*----------  Display Template  ----------*/
echo $template;

 
