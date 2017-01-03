<?php require 'core/init.php'; ?>

<?php

// Get Topic Object
$topic = new Topic();

// Get User Object
$user = new User();



/*----------  Register A New User  ----------*/

// Create Data Array
if (isset($_POST['register'])) {

    // Get Validator Object
    $valid = new Validator();
    
    $data = array();
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password'] = md5($_POST['password']);
    $data['password2'] = $_POST['password2'];
    $data['about'] = $_POST['about'];
    $data['last_activity'] = date('Y-m-d H:j:s');

    // Required Fields Array
    $field_array = array('name', 'email', 'username', 'password', 'password2' );

/*----------  Validate Input Data Fields  ----------*/
    if ($valid->isRequired($field_array)) {
        if ($valid->isValidEmail($data['email'])) {
            if ($valid->passwordsMatch($data['password'], $data['password2'])) {
                // Upload Avatar Image
                if ($user->uploadAvatar()) {
                    $data['avatar'] = $_FILES['avatar']['name'];
                } else {
                    $data['avatar'] = 'noimage.png';
                }
    
                // Register User
                if ($user->register($data)) {
                      redirect('index.php', 'You are registered and may log in', 'success');
                } else {
                      redirect('index.php', 'Something is wrong with your attempt to register', 'error');
                }
            } else {
                redirect('register.php', 'Your Passwards do not match', 'error');
            }
        } else {
            redirect('register.php', 'Please use a valid email address', 'error');
        }
    } else {
          redirect('register.php', 'Please complete all the required fields', 'error');
    }
}




// Get Template & Assign Vars
$template = new Template('templates/register.php');

/*----------  Assign Variables  ----------*/

$template->title = 'Create An Account';
$template->totalTopics = $topic->getTotalTopics();


/*----------  Display Template  ----------*/
echo $template;

