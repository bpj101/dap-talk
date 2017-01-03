<?php require 'core/init.php'; ?>

<?php

// Create Topic Object
$topic = new Topic();



if (isset($_POST['do_create'])) {
  // Get Validator Object
    $valid = new Validator();

  // Create Data Array
    $data = array();
    $data['title'] = $_POST['title'];
    $data['body'] = $_POST['body'];
    $data['category_id'] = $_POST['category'];
    $data['user_id'] = getUser()['user_id'];
    $data['last_activity'] = date('Y-m-d H:j:s');

    // Required Fields Array
    $field_array = array('title', 'body', 'category');

/*----------  Validate Input Data Fields  ----------*/
    if ($valid->isRequired($field_array)) {
        // Create Topic
        if ($topic->create($data)) {
            redirect('index.php', 'Your Topic is created', 'success');
        } else {
            redirect('create.php', 'Something is wrong with topic info', 'error');
        }
    } else {
        redirect('create.php', 'Please complete all the required fields', 'error');
    }
}




// Get Template & Assign Vars
$template = new Template('templates/create.php');

/*----------  Assign Variables  ----------*/

$template->title = 'Create A Topic';

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalTopicsByCategory = $topic->countTopicsByCagegory();

/*----------  Display Template  ----------*/
echo $template;

