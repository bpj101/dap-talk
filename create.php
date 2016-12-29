<?php require 'core/init.php'; ?>

<?php

// Get Template & Assign Vars
$template = new Template('templates/create.php');

/*----------  Assign Variables  ----------*/

$template->heading = 'Create A Topic';

/*----------  Display Template  ----------*/
echo $template;

