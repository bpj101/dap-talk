<?php

/**
 *
 * Set date formate
 *
 */
function formateDate($date)
{
    $date = date("M j, Y, g:i A", strtotime($date));
    return $date;
}

/**
 *
 * Set string to URL Format
 *
 */
function urlFormat($str)
{
  // Strip out all whitespace
    $str = preg_replace('/\s*/', '', $str);
  //Convert the string to all lowercase
    $str = strtolower($str);
  // URL Encode
    $str = urldecode($str);
    return $str;
}

/**
 *
 * Add classname 'active' if category is active
 *
 */
function is_active($category)
{
    if (isset($_GET['category'])) {
        if ($_GET['category'] == $category) {
            return 'active';
        } else {
            return '';
        }
    } else {
        if ($category == null) {
            return 'active';
        }
    }
}
