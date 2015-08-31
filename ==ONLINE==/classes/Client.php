<?php

include_once 'db/DbClient.php';

class Client extends DbClient {
    private $company;

    private $client_name;

    private $client_address;
    
    private $client_postal;
    
    private $client_city;
    
    private $client_telephone;
    
    private $client_email;
    
    private $client_id;
    
    private $client_db;
    
    public function __construct(){
        $this->client_db = new DbClient();
    }
    
    /**
     * @access public
     */
    public function getClientId() {
        if (isset($this->client_id)) {
            return $this->client_id;
        } else {
            return NULL;
        }
    }

    /**
     * @access public
     * @param int client_id
     * @return void
     * @ParamType client_id int
     * @ReturnType void
     */
    public function setClientId($client_id) {
        if (is_numeric($client_id)) {
            $this->user_id = $client_id;
        } else {
            return $client_id . "is not numerical";
        }
    }
    
    public function getCompany(){
        if(isset($this->company)){
            return $this->company;
        }else{
            return NULL;
        }
    }
    
    /**
     * @access public
     * @param string company
     * @return void
     * @ParamType company string
     * @ReturnType void
     */
    public function setCompany($company) {
        $this->company = $company;
    }
    
    public function getClientName(){
        if(isset($this->client_name)){
            return $this->client_name;
        }else{
            return NULL;
        }
    }
    
    public function getClientAddress(){
        if(isset($this->client_address)){
            return $this->client_address;
        }else{
            return NULL;
        }
    }
    
    public function getClientPostal(){
        if(isset($this->client_postal)){
            return $this->client_postal;
        }else{
            return NULL;
        }
    }
    
    public function getClientCity(){
        if(isset($this->client_city)){
            return $this->client_city;
        }else{
            return NULL;
        }
    }
    
    public function getClientTelephone(){
        if(isset($this->client_telephone)){
            return $this->client_telephone;
        }else{
            return NULL;
        }
    }
    
    public function getClientEmail(){
        if(isset($this->client_email)){
            return $this->client_email;
        }else{
            return NULL;
        }
    }
    
    public function setClientName($client_name) {
        $this->client_name = $client_name;
    }
    
    public function setClientAddress($client_address) {
        $this->client_address = $client_address;
    }
    
    public function setClientPostal($client_postal) {
        $this->client_postal = $client_postal;
    }
    
    public function setClientCity($client_city) {
        $this->client_city = $client_city;
    }
    
    public function setClientTelephone($client_telephone) {
        $this->client_telephone = $client_telephone;
    }
    
    public function setClientEmail($client_email) {
        $this->client_email = $client_email;
    }
    
    public function viewAllClients(){
        
        //return $this->client_db->viewAllClients();
        
        $json = json_encode($this->client_db->viewAllClients());
        
        echo $json;
    }
    
    public function addClient(){
        return $this->client_db->addClient($this->company, $this->client_name, $this->client_address, $this->client_postal, $this->client_city, $this->client_telephone, $this->client_email);
    }
    
}
