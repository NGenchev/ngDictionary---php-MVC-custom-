<?php

class AddWord
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
	 * @return array (words)
	 */
	public function add_word($postData)
	{
		extract($postData);
		/**
		 * Get $_POST params and split them in own variables
		 */
		$mngs = array();
		$i = 0;
		foreach($meaning as $mean)
		{
			if(isset($mean) && $mean!=NULL)
			{
				$mngs[$mean] = $submeaning[$i];
				$i++;
			}
		}
		$mngs = json_encode($mngs);

		$sql = "INSERT into words ";
		$sql .= "(`word_original`, `word_translate`, `word_transcription`, `word_meaning`) VALUES ";
		$sql .= "(?, ?, ?, ?)"; // SQL

		/**
		 * Binding params for SQL
		 */
		$insert = $this->dbh->prepare($sql);
		$insert->bindParam(1, $original, PDO::PARAM_STR);
		$insert->bindParam(2, $translate, PDO::PARAM_STR);
		$insert->bindParam(3, $transcription, PDO::PARAM_STR);
		$insert->bindParam(4, $mngs, PDO::PARAM_STR); 

		/**
		 * If query is executed successfuly
		 *
		 * @return bool
		*/
		if($insert->execute())
			return true;
		else
			return false;
	}
}