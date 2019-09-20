<?php

function minimumCasketValue($weight, $value, $maxWeight){
	$n = count($weight)+1;
	$result = array();
	for($i = 1; $i<=$n; $i++){
		for ($w = 0; $w <= $maxWeight; $w++){
			if($i== 1 || $w==0){
				$result[$i][$w]=0;
			}
			elseif ($weight[$i-1] <= $w){//have room for this one then, need to check if by add this one and 
				$result[$i][$w] = max($value[$i-1] + $result[$i-1][$w-$weight[$i-1]], $result[$i-1][$w]);
			}
			else{//don't have room for this one
				$result[$i][$w] = $result[$i-1][$w];
			}
		}
	}

	return $result[$n][$maxWeight];	
}

$a = array( 1 => 60,100,120,240,400);
$b = array( 1 => 5,20,30,50,40);
$c = 50;
print(minimumCasketValue($b,$a,$c))

?>