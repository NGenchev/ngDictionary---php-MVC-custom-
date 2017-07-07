<?php
$api_key = $_POST['_API_KEY_'] ?? "";

if(isset($_POST['id']) && $api_key!=NULL && $api_key === "DoubleG_NG")
{
	$srchWrd = new AllWords();
	$editWord = new EditWord();
	$func 	  = new Functions();
	$wordID = $func->_int($_POST['id']);

	$postData = array(
		"id"			=> $func->_int($_POST['id']),
		"original"		=> htmlentities($_POST['word']),
		"translate"		=> htmlentities($_POST['translate']),
		"transcription"	=> htmlentities($_POST['transcription']),
		"meaning" 		=> $_POST['meaning'],
		"submeanig"		=> $_POST['subMeaning']
	);
	
	$msg = $editWord->edit_word($postData) ? "Успешно редактирахте дума!" : "Проблем с редактирането на дума!";

	echo json_encode($msg);
}