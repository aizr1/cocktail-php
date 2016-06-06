<?php 
include("inc/dbaccess.inc.php");



$qu = "delete from adressen where ID=".$_REQUEST['ID'];

$db->query($qu);

header("location: index.php");
 ?>