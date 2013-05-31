<?php
if($_GET[action] == 'getPermit'){
	$getPermits = $db->prepare("SELECT * FROM `permits` WHERE `permitNumber` = ?");
	$getPermits->execute(array($_GET[permitNumber]));
	$row = $getPermits->fetch(PDO::FETCH_ASSOC);
	json_encode($row);
}


?>