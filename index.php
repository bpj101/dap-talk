<?php require 'core/init.php'; ?>

<?php

// Get Template & Assign Vars
$template = new Template('templates/frontpage.php');

/*----------  Assign Variables  ----------*/

$template->heading = 'Welcome to DAP Talk Space';

/*----------  Display Template  ----------*/
echo $template;

