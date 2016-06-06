<?php 
include("inc/dbaccess.inc.php");

 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Adress-Datenbank</title>
	
</head>
<body id="" onload="">
	<h1>Adressen</h1>
	
	<a href="edit.php?ID=0">Neue Adresse anlegen</a>
	<br /><br />
	<table border="1">
	<tr>
	<th>ID</th>
	<th>Nachname</th>
	<th>Vorname</th>
	<th>Straße</th>
	<th>HNr.</th>
	<th>PLZ</th>
	<th>Ort</th>
	<th>Aktion</th>	
	</tr>
	<?php 
	$qu = "select * from adressen";
	#echo $qu;
	$ret = $db->query($qu);
	while ($arr = $ret->fetch_assoc()):
	?>
	<tr>
	<td><?php echo $arr['ID'] ?></td>
	<td><?php echo $arr['Nachname'] ?></td>
	<td><?php echo $arr['Vorname'] ?></td>
	<td><?php echo $arr['Strasse'] ?></td>
	<td><?php echo $arr['Hnr'] ?></td>
	<td><?php echo $arr['PLZ'] ?></td>
	<td><?php echo $arr['Ort'] ?></td>
	<td>[<a href="edit.php?ID=<?= $arr['ID'] ?>">Edit</a>]
	    [<a href="delete.php?ID=<?= $arr['ID'] ?>">Delete</a>]</td>	
	</tr>
	<?php 
	endwhile;
	?>
	</table>
	
	
</body>

</html>