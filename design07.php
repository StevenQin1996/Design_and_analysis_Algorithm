<?php

function anouncementTime($timeList){
	
	$resultList = [];
	$resultListCounter = 1;
	$resultList[1] = $timeList[1];
	$index = 2;

	// assume time list is sorted by end time. 
	while ($index <= count($timeList))
	{
		//beacause sort by end time, $timeList[index][1] < $resultList[$resultListCounter][1] will not happen. 
		if($timeList[$index][0]>= $resultList[$resultListCounter][0] && $timeList[$index][0] < $resultList[$resultListCounter][1]) // check if the new class start time is between the announcement time period.
		{
			$resultList[$resultListCounter][0] = $timeList[$index][0];
		}
		else if ($timeList[$index][0] >= $resultList[$resultListCounter][1] ){
			$resultListCounter ++;
			$resultList[$resultListCounter] = $timeList[$index];
		}
		//print_r($resultList);
		$index ++;
	}
	$index = 1;
	$result = [];
	//print_r($resultList);
	while ($index <= $resultListCounter){
		$result[$index] = $resultList[$index][0];
		$index ++;
	}
	return $result;
}

function quick_sort($list){
	$length = count($list);

	if ($length <= 1){
		return $list;
	}
	else {
		$pivot = $list[0];

		$left = $right = array();

		for($counter = 1; $counter < count($list); $counter++){
			if($list[$counter][1] < $pivot[1]){
				$left[] = $list[$counter];
			}
			else {
				$right[] = $list[$counter];
			}
		}
		return array_merge(quick_sort($left),array($pivot),quick_sort($right));
	}
}


$testList = [[1,10],[15,25],[31,37],[2,19],[24,40],[4,9],[18,27],[2,13],[20,35],[1,8],[11,20],[28,40]];

//print_r($testList);
$newList = quick_sort($testList);
array_unshift($newList, "xx");
//print_r($newList);
unset($newList[0]);
//print_r($newList);
print_r(anouncementTime($newList))
?>