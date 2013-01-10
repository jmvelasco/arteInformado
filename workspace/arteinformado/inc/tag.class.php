<?php

class Tag {
	var $id = 0;
	var $value = '';
	
	function Tag($value) {
		$this->value = $value;
	}
	
	function create($con) {
		$query = "INSERT INTO `arteinformado`.`tag` (`id`, `nombre`) VALUES (NULL, '". $this->value . "');";
		file_put_contents("log.txt","\nQUERY: ".$query, FILE_APPEND);
		mysql_query($query, $con);
		$this->id = mysql_insert_id($con);		
	}
	
	function remove($id, $con) {
		$query = "DELETE FROM tag WHERE id = " . $id;
		file_put_contents("log.txt","\nTAG BORRADO: ".$query, FILE_APPEND);
		mysql_query($query, $con);
	}
	
	function display() {
		$tag = '<div id="tag_id_'.$this->id.'" class="tag">';
		$tag .= $this->value . '<img src="img/delete.png" class="remove_tag">';
		$tag .= '</div>';
		return $tag;
	}
}