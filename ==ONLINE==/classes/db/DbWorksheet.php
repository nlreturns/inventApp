<?php

include_once "Database.php";

/**
 * Description of DbWorksheet
 *
 * @author janwillem
 */
class DbWorksheet extends Database {
    
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }
    
    public function addWorksheet($client, $material, $stopwatch, $notes, $date, $user, $expenses, $CRM, $CRM_date, $signature_client, $signature_user){
        // handle signature
        $signature = $signature_client;
        
        //$stopwatch['timestamps']['start'];
        
        //build query
        $query = "INSERT INTO  `invent`.`worksheets` (
                `worksheet_notes` ,
                `worksheet_date` ,
                `worksheet_expenses` ,
                `CRM`,
                `CRM_date`,
                `worksheet_signature`,
                `client_id`,
                `user_id`,
                `material`
                )
                  VALUES (
                '" . mysql_real_escape_string($notes) . "',
                '" . mysql_real_escape_string($date) . "',
                '" . mysql_real_escape_string($expenses) . "',
                '" . mysql_real_escape_string($CRM) . "',
                '" . mysql_real_escape_string($CRM_date) . "',
                '" . mysql_real_escape_string($signature) . "',
                '" . mysql_real_escape_string($client) . "',
                '" . mysql_real_escape_string($user) . "',
                '" . mysql_real_escape_string($material) . "' 
                );";
        
        //execute query
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            $worksheet_id = $this->db->connection->insert_id;
        }
        
        // save the stopwatch @TODO loop pauses
        $query = "INSERT INTO `invent`.`stopwatches` (
                `stopwatch_start` ,
                `stopwatch_stop`
                )
                  VALUES (
                '" . mysql_real_escape_string($stopwatch['timestamps']['start']) . "',
                '" . mysql_real_escape_string($stopwatch['timestamps']['stop']) . "'
                );";
        
        if (!$this->db->dbquery($query)) {
            return false;
        } else {
            // get last inserted id
            $stopwatch_id = $this->db->connection->insert_id;
            
            // create link
            $query = "INSERT INTO `invent`.`worksheet_stopwatch` (
                `worksheet_id` ,
                `stopwatch_id`
                )
                  VALUES (
                '" . mysql_real_escape_string($worksheet_id) . "',
                '" . mysql_real_escape_string($stopwatch_id) . "'
                );";
            
            if(!$this->db->dbquery($query)){
                return false;
            }
            
        }
        
    }
    
}
