<?php 
include("inc/dbaccess.inc.php");

if ($_REQUEST['ID']==0){
$qu = "insert into adressen set Nachname='".$_REQUEST['Nachname']."', Vorname='".$_REQUEST['Vorname']."', Strasse='".$_REQUEST['Strasse']."', Hnr = '".$_REQUEST['Hnr']."', PLZ='".$_REQUEST['PLZ']."', Ort='".$_REQUEST['Ort']."'";
} else
{
$qu = "update adressen set Nachname='".$_REQUEST['Nachname'];
$qu.= "', Vorname='".$_REQUEST['Vorname']."', Strasse='";
$qu.= $_REQUEST['Strasse']."', Hnr = '".$_REQUEST['Hnr'];
$qu.= "', PLZ='".$_REQUEST['PLZ']."', Ort='";
$qu.= $_REQUEST['Ort']."' where ID='".$_REQUEST['ID']."'";

}
#echo $qu;
$db->query($qu);



#exit;

header("location: index.php");
 ?>