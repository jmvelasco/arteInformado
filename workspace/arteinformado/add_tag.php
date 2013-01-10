<?php
require_once('conf.php');
require_once('inc/tag.class.php');

$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);

file_put_contents("log.txt","\nNUEVO TAG: " . $_POST['tag'], FILE_APPEND);

$tag_name = htmlspecialchars($_POST['tag']);

$tag = new Tag($tag_name, $con);
$tag->create($con);
echo $tag->display();

/*

$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);
$query = "INSERT INTO `arteinformado`.`tag` (`id`, `nombre`) VALUES (NULL, '". htmlspecialchars($_POST['tag']) . "');";
file_put_contents("log.txt","\nQUERY: ".$query, FILE_APPEND);
mysql_query($query, $con);
$id = mysql_insert_id($con);

echo '<div id="tag_id_'.$id.'" class="tag">';
echo $_POST['tag'] . '<img src="img/delete.png" class="remove_tag">';
echo '</div>';
*/
?>