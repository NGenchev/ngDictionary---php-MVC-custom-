<?php

class EditWord
{
	protected $dbh; #database handler
	
	/**
	 * Make DB Connection in construct.
	 */
	function __construct(){
		$this->dbh = (new DBConnection())->pdo_conn();
	}

	/**
	 * Function add word row in table
	 * 
	 * return array (words)
	 */
	public function edit_word($postData)
	{
		extract($postData);
		
		$mngs = array();
		$i = 0;
		foreach($meaning as $mean)
		{
			if(isset($mean) && $mean!=NULL)
			{
				$mngs[$mean] = $submeanig[$i];
				$i++;
			}
		}
		$mngs = json_encode($mngs);

		$sql = "UPDATE words ";
		$sql .= "SET `word_original`='$original', `word_translate` = '$translate', `word_transcription` = '$transcription', `word_meaning` = '$mngs' WHERE `word_id`='$id'";

		$update = $this->dbh->prepare($sql);
		
		if($update->execute())
			return true;
		else
			return false;
	}
}