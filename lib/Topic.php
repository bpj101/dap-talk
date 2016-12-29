<?php
/**
* Topic Class
*/
class Topic
{
  //_DB Variable
    private $_db;

    public function __construct()
    {
        $this->_db = new Database();
    }

  /*----------  Get All Topics  ----------*/
    public function getAllTopics()
    {
        $this->_db->query("SELECT topics.*, users.username, users.avatar, categories.name FROM topics
                     INNER JOIN users
                     ON topics.user_id = users.id
                     INNER JOIN categories
                     ON topics.category_id = categories.id
                     ORDER BY create_date DESC");

        /*----------  Assign Results Set  ----------*/
        $results = $this->_db->resultset();

        return $results;
    }
}
