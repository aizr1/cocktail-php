<?php 
include("inc/dbaccess.inc.php");

 ?>
<?php 
include("inc/dbaccess.inc.php");

if ($_REQUEST['ID']>0) {
// Adresse aus Datenbank lesen
$qu = "select * from adressen where ID=".$_REQUEST['ID'];

$ret = $db->query($qu);
$arr = $ret->fetch_assoc();

} else
{
$arr['Nachname']="";
$arr['Vorname']="";
$arr['Strasse']="";
$arr['Hnr']="";
$arr['PLZ']="";
$arr['Ort']="";

}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Adress-Datenbank</title>
	
</head>
<body id="" onload="">
	<h1>Adressen editieren</h1>
	
<form action="save.php" method="GET">
<input type="hidden" name="ID" value="<?= $_REQUEST['ID'] ?>">
Nachname: <input type="text" name="Nachname" value="<?= $arr['Nachname'] ?>" /><br />
Vorname: <input type="text" name="Vorname" value="<?= $arr['Vorname'] ?>" /><br />
Straße: <input type="text" name="Strasse" value="<?= $arr['Strasse'] ?>" /><br />
HNr.: <input type="text" name="Hnr" value="<?= $arr['Hnr'] ?>" /><br />
PLZ: <input type="text" name="PLZ" value="<?= $arr['PLZ'] ?>" /><br />
Ort: <input type="text" name="Ort" value="<?= $arr['Ort'] ?>" /><br />

<input type="submit" name="" value="speichern" />
</form>	
	
</body>

</html>