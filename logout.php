<?php

include 'core/init.php';

if (isset($_POST['do_logout'])) {
    // Get Login Data Variables
    $username = $_POST['username'];
    $password = md5($_POST['password']);

  // Create User Object
    $user = new User();

    if ($user->logout()) {
        redirect('index.php', 'You are now logged out', 'success');
    }
} else {
    redirect('index.php');
}
