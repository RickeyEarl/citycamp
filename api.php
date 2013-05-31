<?php
if($_GET[action] == ''){
	$getPermits = $db->prepare("SELECT * FROM `permits` WHERE `permitNumber` = ?");
	$getPermits->execute("")
}


?>