<?php
require_once('conf.php');

// obtener el id del tag a borrar a partir del id
$id = explode("_", $_POST['id_tag']);
echo $id[2];

$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);

$query = "DELETE FROM tag WHERE id = " . $id[2];
file_put_contents("log.txt","\nTAG BORRADO: ".$query, FILE_APPEND);
mysql_query($query, $con);
?>