<?php require 'core/init.php'; ?>

<?php

// Get Template & Assign Vars
$template = new Template('templates/topic.php');

/*----------  Assign Variables  ----------*/

$template->heading = 'How did you learn CSS & HTML';

/*----------  Display Template  ----------*/
echo $template;

