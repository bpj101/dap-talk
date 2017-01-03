<?php

/**
 * Get number of replies per topic.
 */
function replyCount($topic_id)
{
    $db = new Database();

    $db->query('SELECT * FROM replies WHERE topic_id = :topic_id');
    $db->bind(':topic_id', $topic_id);

    // Assign Rows
    $rows = $db->resultset();

    // Get row count
    return $db->rowCount();
}

/**
 * Get the total number of categories.
 */
function getCategories()
{
    $db = new Database();

    $db->query('SELECT * FROM categories');

  // Assign Result Set
    $results = $db->resultset();

    return $results;
}
