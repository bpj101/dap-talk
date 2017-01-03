<?php
/**
 * User Class.
 */
class User
{
    // Initiate DB Variable
    private $_db;

    // Constructor To Initiate Database Object
    public function __construct()
    {
        $this->_db = new Database();
    }

    /*----------  Register New User  ----------*/
    public function register($data)
    {
        // Insert Query
        $this->_db->query('INSERT INTO users (name, email, avatar, username, password, about, last_activity)
                        VALUES ( :name, :email, :avatar, :username, :password, :about, :last_activity)');

      // Bind Values To Users Fields
        $this->_db->bind(':name', $data['name']);
        $this->_db->bind(':email', $data['email']);
        $this->_db->bind(':avatar', $data['avatar']);
        $this->_db->bind(':username', $data['username']);
        $this->_db->bind(':password', $data['password']);
        $this->_db->bind(':about', $data['about']);
        $this->_db->bind(':last_activity', $data['last_activity']);

      // Execute Insert
        if ($this->_db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /*=====================================
    =            Upload Avatar            =
    =====================================*/

    public function uploadAvatar()
    {
        if (!$_FILES['avatar']['type']) {
            return false;
        } else {
            $allowedExts = array('gif', 'jpeg', 'jpg', 'png');
            $temp = explode('.', $_FILES['avatar']['name']);
            $extension = end($temp);

            if ((($_FILES['avatar']['type'] == 'image/gif')
            || ($_FILES['avatar']['type'] == 'image/jpeg')
            || ($_FILES['avatar']['type'] == 'image/jpg')
            || ($_FILES['avatar']['type'] == 'image/pjpeg')
            || ($_FILES['avatar']['type'] == 'image/x-png')
            || ($_FILES['avatar']['type'] == 'image/png'))
            && ($_FILES['avatar']['size'] < 5000)
            && in_array($extension, $allowedExts)) {
                if ($_FILES['avatar']['error'] > 0) {
                    redirect('register.php', $_FILES['avatar']['error'], 'error');
                } else {
                    if (file_exists('img/avatars'.($_FILES['avatar']['name']))) {
                        redirect('register.php', 'Image File already exists', 'error');
                    } else {
                        $name = basename($_FILES['avatar']['name']);
                        move_uploaded_file(
                            $_FILES['avatar']['tmp_name'],
                            'img/avatars/'.$name
                        );

                        return true;
                    }
                }
            } else {
                redirect('register.php', 'Invalid Image File Type!', 'error');
            }
        }
    }

  /*=====  End of Upload Avatar  ======*/

  /*----------  User Login  ----------*/
    public function login($username, $password)
    {
        $this->_db->query("SELECT * FROM users
                        WHERE username = :username
                        AND password = :password");

        //Bind Values
        $this->_db->bind(':username', $username);
        $this->_db->bind(':password', $password);

        $row = $this->_db->single();

        // Check Rows
        if ($this->_db->rowCount() > 0) {
            $this->setUserData($row);
            return true;
        } else {
            return false;
        }
    }

    // Get Total Users
    public function getTotalUsers()
    {
        $this->_db->query('SELECT * FROM users');
        $rows = $this->_db->resultset();
        return $this->_db->rowCount();
    }

    // Set User Data For Logged In
    public function setUserData($row)
    {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['username'] = $row->username;
        $_SESSION['name'] = $row->name;
    }

    // Unset User Data For Logged Out
    public function logout()
    {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
        return true;
    }


}
