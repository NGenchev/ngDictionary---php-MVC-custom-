<?php
function __autoload($className)
{
	$fileName = "./controller/".$className."/index.php";
	if(file_exists($fileName))
		include_once($fileName);
	else
	{
		$fileName = "./model/".$className.".class.php";
		if(file_exists($fileName))
			include_once($fileName);
		else
		{
			$fileName = "./view/".$className.".View.php";
			if(file_exists($fileName))
				include_once($fileName);
			else
				throw new Exception('Несъществуващ обект(модел, контролер или изглед!');
		}
	}
}

$dbh = (new DBConnection())->pdo_conn();
$func = new Functions();