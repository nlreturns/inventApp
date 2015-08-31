<?php

include_once "Database.php";

/**
 * @access public
 * @author janwillem
 * @package Scansysteem
 */
class DbUser extends Database {

    /**
     * @AttributeType Scansysteem.Database
     */
    private $db;

    /**
     * @access public
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * @access public
     * @param string $user_name
     * @param string $user_password
     * @param int $user_type
     * @ParamType $user_name string
     * @ParamType $user_password string
     * @ParamType $user_email string
     */
    public function addUser($user_name, $user_password, $user_email) {
        //build query
        $query = "INSERT INTO  `inceptio`.`users` (
                `user_id` ,
                `user_name` ,
                `user_password` ,
                `user_type`
                )
                  VALUES (
                NULL, 
                '" . mysql_real_escape_string($user_name) . "',
                '" . mysql_real_escape_string($user_password) . "',
                '" . mysql_real_escape_string($user_type) . "'
                );";
        
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            echo "Gebruiker aangemaakt.";
        }
    }

    /**
     * @access public
     * @param int $user_id
     * @ParamType $user_id int
     */
    public function deleteUser($user_id) {
        //build query
        $query = "DELETE FROM `users` WHERE user_id = " . $user_id;
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     * @param int $user_id
     * @ParamType $user_id int
     */
    public function viewUser($user_id) {
        //build query
        $query = "SELECT * FROM `users` WHERE user_id = " . $user_id;
        
        // fetch query
        $data = $this->db->dbFetchArray($query);
        
        // check data
        if ( $data == NULL) {
            return FALSE;
        }
        return $data;
    }

    /**
     * @access public
     * @param int $user_id
     * @param string $user_name
     * @param string $user_password
     * @param int $user_type
     * @ParamType $user_id int
     * @ParamType $user_name string
     * @ParamType $user_password string
     * @ParamType $user_type int
     */
    public function editUser($user_id, $user_name, $user_password, $user_type) {
        //build query
        $query = "UPDATE `users` SET `user_name` = '".$user_name."', `user_password` = '".$user_password."', `user_type` = '".$user_type."' WHERE `users`.`user_id` = ".$user_id.";";
        
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @access public
     */
    public function viewAllUsers($page, $limit) {
        if($page == 0){
            
        }else{
            $page *= 30;
        }
        //build query
        $query = "SELECT * FROM `users` ORDER BY `user_name` ASC LIMIT " . $limit . " OFFSET " . $page;
        
        // check for data
        if (!$this->db->dbquery($query)) {
            return false;
        }
        // fetch data
        if(!($result = $this->db->dbFetchAll())){
            // set error.
            echo TXT_NO_DATA;
            return FALSE;
        }
        // return
        return $result;
    }

    /**
     * @access public
     * @param string $user_name
     * @param string $user_password
     */
    public function login($user_name, $user_password) {
        // build query
        $sql = "SELECT * FROM users WHERE user_name = '$user_name' AND user_password = '$user_password' LIMIT 1";
        // execute query, fill into $results
        $result = $this->db->dbquery($sql);
        
        //check if any results
        $count = mysqli_num_rows($result);
        
        $result = $this->db->dbFetchAll();
        
        if ($count == 1) {
            return $result;
        }
        
        return false;
    }

}

?>