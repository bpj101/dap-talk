<?php require 'core/init.php'; ?>

<?php

// Get Template & Assign Vars
$template = new Template('templates/register.php');

/*----------  Assign Variables  ----------*/

$template->heading = 'Create An Account';

/*----------  Display Template  ----------*/
echo $template;

