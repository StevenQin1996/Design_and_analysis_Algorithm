<?php

function countOccurences($A,$v)
{
    $howmany = array_count_values($A);
    return ( array_key_exists($v,$howmany) ? $howmany[$v] : 0 );
}

function majorityElement($A)
{
    if (count($A) == 1){
    	return $A[1];
    }

    $mid = floor(count($A)/2);
    $leftPart = array_slice($A,0,$mid);
    $rightPart = array_slice($A,$mid,count($A));
    //echo "left: ", print_r($leftPart),"\n";
    //echo "right: ", print_r($rightPart),"\n";
 	array_unshift($leftPart,0);
 	array_unshift($rightPart,0);
 	//echo "left: ", print_r($leftPart),"\n";
    //echo "right: ", print_r($rightPart),"\n";
 	unset($leftPart[0]);
 	unset($rightPart[0]);
    //echo "left: ", print_r($leftPart),"\n";
    //echo "right: ", print_r($rightPart),"\n";
    

    $left = majorityElement($leftPart);
 	$right = majorityElement($rightPart);
    //echo "left: ", print_r($left),"\n";
    //echo "right: ", print_r($right),"\n";
    //echo "wired \n";

    /*
    $leftPart = array_slice($A,0,$mid);
    $rightPart = array_slice($A,$mid,count($A));
    $left = majorityElement(array( 1 => $leftPart));
 	$right = majorityElement(array( 1 => $rightPart));
 	echo "left: ", print_r($left);
    echo "right: ",print_r($right);
 	*/

 	
 	//why doesn't this code work?
    
    /*
    $leftPart = array_slice($A,0,$mid);
    $rightPart = array_slice($A,$mid,count($A));
 	$left = majorityElement($leftPart);
 	$right = majorityElement($rightPart);
 	echo "left: ", print_r($left);
    echo "right: ",print_r($right);
    */
 	
  
    if ($left == $right){
    	return $left[0];
    }
    //echo "left[1]: ", print_r($left[1]),"\n";
    //echo "right[1]: ", print_r($right[1]),"\n";
    $leftCount = countOccurences($A,$left[0]);
    $rightCount = countOccurences($A,$right[0]);
    //echo "leftCount: ", $leftCount,"\n";
    //echo "leftCount: ", $rightCount,"\n";
    
    if ($leftCount >= $mid +1){
    	return $left[1];
    }
    elseif($rightCount >= $mid +1){
    	return $right[1];
    }
    else{
    	return "NONE";
    }
    return $left;
    return $right;
}

$a = array( 1 => 4,5,4);

echo "Majority element: ".majorityElement($a)."\n";
