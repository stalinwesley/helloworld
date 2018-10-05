<?php 

include('adodb/adodb.inc.php');
$driver = "mysqli";
$host = "localhost";
$user = "root";
$password = "";
$database = "test";
$db = ADONewConnection($driver); # eg. 'mysql' or 'oci8'
// $db->debug = true;
$db->Connect($server, $user, $password, $database);
$rs = $db->Execute('select * from employees');
$myrs = $rs->GetRows();

// print "<pre>";
// print_r($rs->GetRows());
// print "</pre>";

?>