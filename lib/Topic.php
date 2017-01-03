<?php
/**
* Topic Class.
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
        $this->_db->query('SELECT topics.*, users.username, users.avatar, categories.name FROM topics
                     INNER JOIN users
                     ON topics.user_id = users.id
                     INNER JOIN categories
                     ON topics.category_id = categories.id
                     ORDER BY create_date DESC');

        // Execute And Assign Results Set
        $results = $this->_db->resultset();

        return $results;
    }

    /*----------  Get Single Topic  ----------*/
    public function getSingle($id)
    {
        $this->_db->query('SELECT topics.*, users.username, users.avatar, categories.name FROM topics                     
                     INNER JOIN users
                     ON topics.user_id = users.id
                     INNER JOIN categories
                     ON topics.category_id = categories.id
                     WHERE topics.id = :id');

        $this->_db->bind(':id', $id);

        // Execute And Assign Results Set
        $results1 = $this->_db->resultset();

        $this->_db->query('SELECT replies.*, users.username, users.avatar FROM replies                     
                     INNER JOIN users
                     ON replies.user_id = users.id
              
                     WHERE replies.topic_id = :id');

        $this->_db->bind(':id', $id);

        // Execute And Assign Results Set
        $results2 = $this->_db->resultset();

        $results = array();

        // print_r($results1);
        // print_r($results2);

        $results[] = $results1;
        $results[] = $results2;

        return $results;
    }

    /*----------  Get All Topics Of A Single Category  ----------*/

    public function getByCategory($category_id)
    {
        $this->_db->query('SELECT topics.*, users.username, users.avatar, categories.name FROM topics
                     INNER JOIN users
                     ON topics.user_id = users.id
                     INNER JOIN categories
                     ON topics.category_id = categories.id
                     WHERE topics.category_id = :category_id
                     ORDER BY create_date DESC');

        $this->_db->bind(':category_id', $category_id);

        // Execute And Assign Results Set
        $results = $this->_db->resultset();

        return $results;
    }

    /*----------  Count Topics by Category  ----------*/
    public function countTopicsByCagegory()
    {
        $this->_db->query('SELECT categories.name, COUNT(category_id) FROM topics
                          INNER JOIN categories
                          GROUP BY category_id');

        $results = $this->_db->resultset();

        return $results;
    }

    /*----------  Get Total Number of Topics  ----------*/
    public function getTotalTopics()
    {
        $this->_db->query('SELECT * FROM topics');
        $rows = $this->_db->resultset();

        return $this->_db->rowCount();
    }

    /*----------  Get Total Number of Categories  ----------*/
    public function getTotalCategories()
    {
        $this->_db->query('SELECT * FROM categories');
        $rows = $this->_db->resultset();

        return $this->_db->rowCount();
    }

    /*----------  Get Total Number of Replies  ----------*/
    public function getTotalReplies($topic_id)
    {
        $this->_db->query('SELECT * FROM replies WHERE topic_id ='.$topic_id);
        $rows = $this->_db->resultset();

        return $this->_db->rowCount();
    }

    /*----------  Create Topic  ----------*/
    public function create($data)
    {
        // Insert Query
        $this->_db->query('INSERT INTO topics (title, body, category_id, user_id, last_activity)
                        VALUES ( :title, :body, :category_id, :user_id, :last_activity)');

      // Bind Values To Users Fields
        $this->_db->bind(':title', $data['title']);
        $this->_db->bind(':body', $data['body']);
        $this->_db->bind(':category_id', $data['category_id']);
        $this->_db->bind(':user_id', $data['user_id']);
        $this->_db->bind(':last_activity', $data['last_activity']);

      // Execute Insert
        if ($this->_db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /*----------  Add Reply  ----------*/
    public function reply($data)
    {
        // Insert Query
        $this->_db->query('INSERT INTO replies (topic_id, user_id, body)
                        VALUES ( :topic_id, :user_id, :body)');

      // Bind Values To Users Fields
        $this->_db->bind(':topic_id', $data['topic_id']);
        $this->_db->bind(':user_id', $data['user_id']);
        $this->_db->bind(':body', $data['body']);

      // Execute Insert
        if ($this->_db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
