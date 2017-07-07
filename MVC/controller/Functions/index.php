<?php
# Basic functions
class Functions
{
	public function _int($num)
	{
		$num = (int)$num;
		if(filter_var($num, FILTER_VALIDATE_INT))
			if($num > 0)
				if(is_int($num)===true)
					return $num;
				else return 1;
			else return 1;
		else return 1;
	}

	public function randomize_res($prefix)
	{
		$min = 0;
		$max = 5;
		$date = date('Hisdm');
    	$number = rand($min, $max);
    	$number = $number < 10 ? (string)"0".(string)$number : $number;
    	$unique = $prefix."_".$date."_".$number;
    	return $unique;
    }

    function l($act){

    }


}