<?php require 'core/init.php'; ?>

<?php
// Get Topic Object
$topic = new Topic();
// Get Template & Assign Vars
$template = new Template('templates/frontpage.php');

/*----------  Assign Template Variables  ----------*/

$template->heading = 'Welcome to DAP Talk Space';
$template->topics = $topic->getAllTopics();

/*----------  Display Template  ----------*/
echo $template;

