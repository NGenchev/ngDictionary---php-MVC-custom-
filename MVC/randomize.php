<?php require_once('autoload.php');
/*
 * API for random key
 *
 * @copyright NGenchevEOOD
 * @return string
 **/
### BG_2358370607_94

function shutdown() 
 { 
     $a=error_get_last(); 
     if($a!=null)
     	echo "Моля опитайте по-късно!";
 } 
register_shutdown_function('shutdown'); 
ini_set('max_execution_time', 60); 
ini_set('display_errors', '0'); 

define("_PREFIX_", "BG"); // prefix for unique num
$email = "user@example.com"; //from form or db...
$dbh = (new DBConnection())->pdo_conn();
$func = new Functions();

$j = 1;
for($i=1;$i<=1000;$i++) //make some fake queries
{
	$j = 0;
	$count = 1;
	$randNum = NULL;
	while($count!=0)
	{
		$randNum = $func->randomize_res(_PREFIX_);
		$sql = "select res_id from reservation where res_id = '$randNum'";
		$srch = $dbh->prepare($sql);
		$srch->execute();
		$count = $srch->rowCount();
		$j++;
		sleep(0.5);
	}
	echo "#$i is added after ".$j." attempts<BR>";

	$sql = "INSERT INTO reservation (`res_id`, `res_email`) VALUES ('$randNum', '$email')";
	$add = $dbh->prepare($sql);
	$add->execute();
	$j = 0;
}