<?php
require_once "vendor/autoload.php";
  
use OmnipayOmnipay;
   
// Connect with the database 
$db = new mysqli('localhost', 'root', '', 'rattrapage');
    
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
   
$gateway = Omnipay::create('Stripe');
$gateway->setApiKey('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');
