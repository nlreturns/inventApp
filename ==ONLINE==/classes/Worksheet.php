<?php

include_once "db/DbWorksheet.php";

/**
 * Description of Worksheet
 *
 * @author janwillem
 */
class Worksheet extends DbWorksheet {
    private $client;
    
    private $material;
    
    private $stopwatch;
    
    private $notes;
    
    private $date;
    
    private $user;
    
    private $expenses;
    
    private $CRM;
    
    private $CRM_date;
    
    private $signature_client;
    
    private $signature_user;
    
    private $worksheet_db;
    
    public function __construct() {
        $this->worksheet_db = new DbWorksheet();
    }
    
    public function getClient() {
        if (isset($this->client)) {
            return $this->client;
        } else {
            return NULL;
        }
    }
    
    public function getMaterial() {
        if (isset($this->material)) {
            return $this->material;
        } else {
            return NULL;
        }
    }
    
    public function getStopwatch() {
        if (isset($this->stopwatch)) {
            return $this->stopwatch;
        } else {
            return NULL;
        }
    }
    
    public function getNotes() {
        if (isset($this->notes)) {
            return $this->notes;
        } else {
            return NULL;
        }
    }
    
    public function getDate() {
        if (isset($this->date)) {
            return $this->date;
        } else {
            return NULL;
        }
    }
    
    public function getUser() {
        if (isset($this->user)) {
            return $this->user;
        } else {
            return NULL;
        }
    }
    
    public function getExpenses() {
        if (isset($this->expenses)) {
            return $this->expenses;
        } else {
            return NULL;
        }
    }
    
    public function getCRM() {
        if (isset($this->CRM)) {
            return $this->CRM;
        } else {
            return NULL;
        }
    }
    
    public function getCRMDate() {
        if (isset($this->CRM_date)) {
            return $this->CRM_date;
        } else {
            return NULL;
        }
    }
    
    public function getSignatureClient() {
        if (isset($this->signature_client)) {
            return $this->signature_client;
        } else {
            return NULL;
        }
    }
    
    public function getSignatureUser() {
        if (isset($this->signature_user)) {
            return $this->signature_user;
        } else {
            return NULL;
        }
    }
    
    public function setClient($client) {
        $this->client = $client;
    }
    
    public function setMaterial($material) {
        $this->material = $material;
    }
    
    public function setStopwatch($stopwatch) {
        $this->stopwatch = $stopwatch;
    }
    
    public function setNotes($notes) {
        $this->notes = $notes;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function setUser($user) {
        $this->user = $user;
    }
    
    public function setExpenses($expenses) {
        $this->expenses = $expenses;
    }
    public function setCRM($crm) {
        $this->CRM = $crm;
    }
    public function setCRMDate($crm_date) {
        $this->CRM_date = $crm_date;
    }
    
    public function setSignatureClient($signature_client) {
        $this->signature_client = $signature_client;
    }
    
    public function setSignatureUser($signature_user) {
        $this->signature_user = $signature_user;
    }
    
    public function addWorksheet(){
        $this->worksheet_db->addWorksheet($this->client, $this->material, $this->stopwatch, $this->notes, $this->date, $this->user, $this->expenses, $this->CRM, $this->CRM_date, $this->signature_client, $this->signature_user);
    }
    
    
    
}
