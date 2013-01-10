<?php
require_once('conf.php');

$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);
$query = "SELECT * FROM `arteinformado`.`tag`;";
file_put_contents("log.txt","\nQUERY: ".$query, FILE_APPEND);
$res = mysql_query($query, $con);
while ($rs = mysql_fetch_array($res)) {
	echo '<div id="tag_id_'.$rs['id'].'" class="tag">';
	echo $rs['nombre'] . '<img src="img/delete.png" class="remove_tag">';
	echo '</div>';
	file_put_contents("log.txt","\nRESULT: ".$rs['id'].": ".$rs['nombre'], FILE_APPEND);
}






?>
