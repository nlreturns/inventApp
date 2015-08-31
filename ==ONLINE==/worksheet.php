<?php

include_once "classes/Worksheet.php";
include_once "classes/Client.php";

$worksheet = new Worksheet();

//check if client has to be added
if($_POST['worksheet']['addCompany']){
    
    $info = $_POST['worksheet']['addCompany'];
    
    // add through Client class, get last id and setClient
    $client = new Client();
    
    $client->setClientAddress($info['address']);
    $client->setClientCity($info['city']);
    $client->setClientEmail($info['email']);
    $client->setClientName($info['name']);
    $client->setClientPostal($info['postal']);
    $client->setClientTelephone($info['phone']);
    $client->setCompany($info['company']);
    
    $client_id = $client->addClient();
    
    $worksheet->setClient($client_id);
    
    
}else{
    // its set as false, take saved id
    $worksheet->setClient($_POST['worksheet']['client']);
}

// set data
$worksheet->setCRM($_POST['worksheet']['CRMNumber']);
$worksheet->setCRMDate($_POST['worksheet']['CRMDate']);
$worksheet->setDate($_POST['worksheet']['date']);
$worksheet->setExpenses($_POST['worksheet']['expenses']);
$worksheet->setMaterial($_POST['worksheet']['material']);
$worksheet->setNotes($_POST['worksheet']['notes']);
$worksheet->setSignatureClient($_POST['worksheet']['signature']);
$worksheet->setSignatureUser(1);
$worksheet->setStopwatch($_POST['worksheet']['stopwatch']);
$worksheet->setUser($_POST['worksheet']['user']);

$worksheet->addWorksheet();

//var_dump($_POST);

/**
 * array(1) {
  ["worksheet"]=>
  array(6) {
    ["worksheetstatus"]=>
    string(1) "1"
    ["user"]=>
    string(1) "1"
    ["stopwatch"]=>
    array(2) {
      ["timestamps"]=>
      array(6) {
        ["start"]=>
        string(11) "6-9 0:50:16"
        ["Stop"]=>
        string(11) "6-9 0:50:27"
        ["pause2"]=>
        string(11) "6-9 0:50:29"
        ["pause3"]=>
        string(11) "6-9 0:50:29"
        ["pause4"]=>
        string(11) "6-9 0:50:30"
        ["pause5"]=>
        string(11) "6-9 0:50:30"
      }
      ["pause"]=>
      string(5) "false"
    }
    ["notes"]=>
    string(12) "Testtesttest"
    ["client"]=>
    string(1) "3"
    ["expenses"]=>
    string(0) ""
  }
}
 */