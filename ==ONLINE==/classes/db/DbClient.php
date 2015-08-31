<?php

include_once "Database.php";

class DbClient extends Database {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function viewAllClients() {
        //build query
        $query = "SELECT * FROM `clients` ORDER BY `client_name` ASC";

        // check for data
        if (!$this->db->dbquery($query)) {
            return false;
        }
        // fetch data
        if (!($result = $this->db->dbFetchAll())) {
            // set error.
            echo TXT_NO_DATA;
            return FALSE;
        }
        // return 
        return $result;
    }

    public function addClient($company, $client_name, $client_address, $client_postal, $client_city, $client_telephone, $client_email) {
        //build query
        $query = "INSERT INTO  `invent`.`clients` (
                `client_company` ,
                `client_name` ,
                `client_address` ,
                `client_postal`,
                `client_city`,
                `client_phone`,
                `client_email`
                )
                  VALUES (
                '" . mysql_real_escape_string($company) . "',
                '" . mysql_real_escape_string($client_name) . "',
                '" . mysql_real_escape_string($client_address) . "',
                '" . mysql_real_escape_string($client_postal) . "',
                '" . mysql_real_escape_string($client_city) . "',
                '" . mysql_real_escape_string($client_telephone) . "',
                '" . mysql_real_escape_string($client_email) . "'
                );";
        var_dump($query);
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            // return inserted id
            return $this->db->connection->insert_id;
        }
    }

}
