<?php
class DeleteWord
{
	protected $dbh; #database handler
	
	/**
	 * Make DB Connection in construct.
	 */
	function __construct(){
		$this->dbh = (new DBConnection())->pdo_conn();
	}

	/**
	 * Function delete word row in table
	 * 
	 * return bool
	 */
	public function delete_word($id)
	{
		$sql = "DELETE FROM words WHERE word_id = '$id'";
		$delete = $this->dbh->prepare($sql);
		$delete->execute();

		return $delete ? true : false;
	}
}