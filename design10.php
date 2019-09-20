<?php


function inheritance($passList)
{
    $myMoney = 0;
    $hisMoney = 0;
    $head = 1;
 	$tail = count($passList);
	while ($head + 1 < $tail)// there are more than 2 unchecked value in the list
	{
		$A = $passList[$head]; 
		$B = $passList[$head +1]; 
		$C = $passList[$tail-1]; 
		$D = $passList[$tail];
 		$localMax = max($A,$B,$C,$D);
 		if (($localMax == $A)|| ($A + $C > $B + $D)) // I pick head
 		{
			$myMoney +=$passList[$head];
			$head += 1;
			if($passList[$head]>$passList[$tail])// he pick head
			{
				$hisMoney += $passList[$head];
				$head += 1;
			}
			else// he pick tail
			{
				$hisMoney += $passList[$tail];
				$tail -= 1;
			}
 		}
 		else //I pick tail
 		{
 			$myMoney += $passList[$tail];
			$tail -= 1;
			if($passList[$head]>$passList[$tail])// he pick head
			{
				$hisMoney += $passList[$head];
				$head += 1;
			}
			else// he pick tail
			{
				$hisMoney += $passList[$tail];
				$tail -= 1;
			}
 		}
	}
	$myMoney += max($passList[$head], $passList[$tail]);
	$hisMoney += min($passList[$head], $passList[$tail]);
	$result = $myMoney - $hisMoney;
 	return $result;
}


$list[0] = array(1 => 9,4,5,8);
$list[1] = array(1 => 7,8,5,2);
$list[2] = array(1 => 7,8,5,9);
$list[3] = array(1 => 2,6,7,4);
$list[4] = array (1 => 100,2,3,43,5,6,8,5,67,54,12,24);
$list[5] = array (1 => 100,25,3,43,5,6,8,5,67,54,72,24);
$list[6] = array (1 => 10,20,34,43,5,6,8,5,67,54,12,24);
$list[7] = array(1 => 9,9,9,9);

foreach($list as $tempList)
{
	$result = inheritance($tempList);
	echo "The largest possible inheritancethat you can definitely win is: ", $result, ". \n";
}

?>