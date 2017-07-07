<?php
class AllWords
{
	protected $dbh; #database handler
	
	/**
	 * Make DB Connection in construct.
	*/
	function __construct(){
		$this->dbh = (new DBConnection())->pdo_conn();
	}

	/**
	 * Function get all words from database
	 * 
	 * @return array (words)
	 */
	public function get_words()
	{
		$sql = "SELECT * FROM words ORDER BY word_original ASC";
		$getAllWords = $this->dbh->prepare($sql);
		$getAllWords->execute();
		$words = $getAllWords->fetchAll();

		return $words;
	}

	/**
	 * Function search for word exsist
	 * 
	 * @return bool
	 */
	public function search_word($id)
	{
		$sql = "SELECT * FROM words WHERE `word_id` = :wordid";
		$searchForWord = $this->dbh->prepare($sql);
		$searchForWord->bindParam(":wordid", $id, PDO::PARAM_INT);
		$searchForWord->execute();
 		
 		return $searchForWord->fetchAll();
	}
}