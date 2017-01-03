<?php require 'core/init.php'; ?>

<?php

// Get Topic Object
$topic = new Topic();

// $_GET category from URL variable
$topic_id = isset($_GET['id']) ? $_GET['id'] : null;

/*----------  Add Reply to Topic  ----------*/
if (isset($_POST['do_reply'])) {
  // Create Data Array
    $data = array();
    $data['topic_id'] = $_GET['id'];
    $data['body'] = $_POST['body'];
    $data['user_id'] = getUser()['user_id'];

    // Create Validator Object
    $valid = new Validator();

    // Required Fields Array
    $field_array = array('body');

    // Validate field
    if ($valid->isRequired($field_array)) {
        // Create Reply
        if ($topic->reply($data)) {
            redirect('topic.php?id='.$topic_id, 'Your reply is posted', 'success');
        } else {
            redirect('topic.php?id='.$topic_id, 'Something is wrong with your reply', 'error');
        }
    } else {
        redirect('topic.php?id='.$topic_id, 'Please complete all the required fields', 'error');
    }
}


// Get Template & Assign Vars
$template = new Template('templates/topic.php');

/*----------  Assign Variables  ----------*/


$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalTopicsByCategory = $topic->countTopicsByCagegory();

// Single Topic And Replies
if ($topic_id) {
    $tmpResults = $topic->getSingle($topic_id);
    // print_r($tmpResults);
    // die();
    $template->topic = $tmpResults[0][0];
    $template->title = $tmpResults[0][0]->title;

    if (count($tmpResults[1]) > 0) {
        $template->replies = $tmpResults[1];
    } else {
        $template->replies = null;
    }
    // print_r($template->topic);
    // print_r($template->replies);
    // die();
}

/*----------  Display Template  ----------*/
echo $template;

