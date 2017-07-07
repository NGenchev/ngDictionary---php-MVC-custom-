<?php
/**
 * Words are separeted in rows
 * Their meanings 
 */
class Words
{
	public $design;

	function __construct($action)
	{
		$this->design = new Design();
		
		if(method_exists("Words", $action))
			$this->$action();
	}
	
	public function index()
	{
		$obj = new AllWords();

		foreach($obj->get_words() as $word):
			// $meanings = $word['word_meaning'];
			// if(!empty($meanings)):
			// 	$clearMngs = array();

			// 	$mngs = explode("@", $meanings);
			// 	foreach($mngs as $mng)
			// 	{
			// 		$separateMean = explode("|", $mng);
			// 		$subMngs = explode("=", $separateMean[1]);
			// 		if((count($subMngs)-1)!=0)
			// 		{
			// 			$clearMngs[$separateMean[0]] = "(";
			// 			for($k = 0; $k < count($subMngs)-1; $k++) 
			// 				$clearMngs[$separateMean[0]] .= $subMngs[$k].", ";	
			// 			$clearMngs[$separateMean[0]] .= $subMngs[count($subMngs)-1] . ")";
			// 		}
			// 		else
			// 			$clearMngs[$separateMean[0]] = "";
			// 	}
			// endif;

			$postArr[] = array(
					"id" 			=> $word['word_id'],
					"original" 		=> $word['word_original'],
					"translate" 	=> $word['word_translate'],
					"transcription" => $word['word_transcription'],
					"meaning"		=> $word['word_meaning']
				);
		endforeach;

		$this->design->template = "words";
		$this->design->data     = array(
				"title" => "Всички думи в речника",
				"desc"  => "Таблица с всички думи, които се съдържат в базата от данни",
				"html"  => "",
				"words" => $postArr
			);
		if(isset($_GET['error']) && $_GET['error']==1)
			$this->design->data['msg'] = "<div class='msg'>Проблем с изтриването на думата!</div>";
	}

	public function add()
	{
		$this->design->template = "form";
		$this->design->data = array(
			"title" => "Добави дума",
			"desc"  => "Форма за добавяне на думи",
			"params"=> "",
			"msg"   => ""
		);
		$addWordObject = new AddWord();

		if(isset($_POST['addWord'])) 
		{
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
	}

	public function edit()
	{
		$this->design->template = "form";
		$this->design->data = array(
			"title" => "Редактирай дума",
			"desc"  => "Форма за редактиране на думи",
			"params"=> "",
			"msg"   => ""
		);

		$srchWrd = new AllWords();
		$editWord = new EditWord();
		$func 	  = new Functions();
		$wordID = $func->_int($_GET['id']);

		if(isset($_POST['editWord'])) 
		{
			$postData = array(
				"id"			=> $func->_int($_POST['id']),
				"original"		=> htmlentities($_POST['word']),
				"translate"		=> htmlentities($_POST['translate']),
				"transcription"	=> htmlentities($_POST['transcription']),
				"meaning" 		=> $_POST['meaning'],
				"submeanig"		=> $_POST['subMeaning']
			);
			$this->design->data['msg'] = $editWord->edit_word($postData) ? "Успешно редактирахте дума!" : "Проблем с редактирането на дума!";
			
		}
		
		$msg = null;
		if(empty($srchWrd->search_word($wordID))) 
			$msg = "Няма такова ID в базата от данни!";

		if($msg == NULL)
		{
			$word = $srchWrd->search_word($wordID)[0];

			$myData = array(
				"id"			=> $word['word_id'],
				"original"		=> $word['word_original'],
				"translate"		=> $word['word_translate'],
				"transcription"	=> $word['word_transcription'],
				"meaning"  		=> $word['word_meaning']
			);

			$this->design->data['params'] = $myData;
		}
		else
			$this->design->data['msg'] = $msg;
	}

	public function delete()
	{
		$deleteObj  = new DeleteWord();
		$func 		= new Functions();

		$wordID = $func->_int($_GET['id']);

		if($deleteObj->delete_word($wordID))
			header("Location: ./?page=words&action=index&error=0");
		else
			header("Location: ./?page=words&action=index&error=1");
	}
}