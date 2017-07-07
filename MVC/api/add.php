<?php
$api_key = $_POST['_API_KEY_'] ?? "";

if(isset($_POST['addWord']) && $api_key!=NULL && $api_key === "DoubleG_NG")
{
	$addWordObject = new AddWord();
	$check = false;
	extract($_POST);
	if((isset($transcription) && $transcription != NULL && strlen($transcription)>0)
	 &&(isset($translate) && $translate != NULL && strlen($translate)>0)
	  &&(isset($meaning) && is_array($meaning) && !empty($meaning))
	   &&(isset($word) && $word != NULL && strlen($word)>0))
	   	 $check = true;
	   	
	$postData = array(
		"original"=>$_POST['word'],
		"translate"=>$_POST['translate'],
		"transcription"=>$_POST['transcription'],
		"meaning" => $_POST['meaning'],
		"submeaning"=> $_POST['subMeaning']
	);
	$this->design->data['msg'] = $addWordObject->add_word($postData) ? "Успешно добавихте дума!" : "Проблем с добавянето на дума!";
}