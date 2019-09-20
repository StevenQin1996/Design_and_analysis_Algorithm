<?php

//steven Qin


$array1 =  array(1=>1,2,3,9,65,12,13,21,8,19);
$array2 =  array(1=>2,3,6,8,12,13,14,15,19,20);
$array3 =  array(1=>1,7,10,11,12,15,16,17,20);

Wobbly($array1); //output should be: 1,3,2,65,9,13,12,21,8,19



Wobbly($array2); //output should be: 2,6,3,12,8,14,13,19,15,20
Wobbly($array3); //output should be: 1,10,7,12,11,16,15,20,17


function Wobbly($L)
{
	$aCounter = 1;
	$bCounter = 2;
	$n = count($L);
	while($aCounter <= $n -2 )
	{
		if($L[$aCounter] > $L[$bCounter])
		{
			$Temp = $L[$aCounter];
			$L[$aCounter] = $L[$bCounter];
			$L[$bCounter] = $Temp;
			
		}
		
		$aCounter = $aCounter + 2;
		if($L[$aCounter] > $L[$bCounter])
		{
			$Temp = $L[$aCounter];
			$L[$aCounter] = $L[$bCounter];
			$L[$bCounter] = $Temp;
		
		}
			$bCounter = $bCounter + 2;
	}

	echo implode(",",$L)."\n"; //output for testing
	return $L;
}
