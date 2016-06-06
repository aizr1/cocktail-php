<?php  
// Datenbankserver kontaktieren

$db_host = '';
$db_base = 'adressdb';
$db_user = 'Adressdb';
$db_passwd = 'test';


$db = new mysqli($db_host, $db_user, $db_passwd,$db_base);

$db->query("SET NAMES 'utf8'");

?>