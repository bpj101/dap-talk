<?php

/*========================================
=            Redirect To Page            =
========================================*/

function redirect($page = false, $message = null, $message_type = null)
{
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }
  
  // Check For Message
    if ($message != null) {
        //Set Message
        $_SESSION['message'] = $message;
    }

  // Check For Message_Type
    if ($message_type != null) {
        //Set Message Type
        $_SESSION['message_type'] = $message_type;
    }

  // Redirect
    header('Location: '.$location);
    exit;
}

/*=====  End of Redirect To Page  ======*/

/*=======================================
=            Display Message            =
=======================================*/

function displayMessage()
{
    if (!empty($_SESSION['message'])) {
        // Assign Message Variable
        $message = $_SESSION['message'];

        if (!empty($_SESSION['message_type'])) {
            // Assign Message_Type Variable
            $message_type = $_SESSION['message_type'];
            // Create Output
            if ($message_type == 'error') {
                echo '<div class="alert alert-danger">'.$message.'</div>';
            } else {
                echo '<div class="alert alert-success">'.$message.'</div>';
            }
        }
        // Unset Messate
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } else {
        echo "";
    }
}

/*=====  End of Display Message  ======*/

/*----------  Check if User Is Logged In  ----------*/
function isLoggedIn()
{
    if (isset($_SESSION['is_logged_in'])) {
        return true;
    } else {
        return false;
    }
}

/*----------  Get Logged in User Info  ----------*/
function getUser()
{
    $userArray = array();
    $userArray['user_id'] = $_SESSION['user_id'];
    $userArray['username'] = $_SESSION['username'];
    $userArray['name'] = $_SESSION['name'];
    return $userArray;
}
