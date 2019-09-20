
<?php

//steven Qin


function Compare($A,$B)
{
  $sizeA =count($A);
  $sizeB =count($B);

  
  $aCounter = 1;
  $bCounter = 1;
  $common = array();
      
  while($aCounter <= $sizeA && $bCounter <= $sizeB)
  {
    
  	if ($A[$aCounter] == $B[$bCounter])
  	{
  		array_push($common,$A[$aCounter]);
  		$aCounter = $aCounter + 1;
  		$bCounter = $bCounter + 1;
  	}
  	elseif ($A[$aCounter] < $B[$bCounter]) 
  	{
  		$aCounter = $aCounter + 1;
  	}
  	else 
  	{
  	    $bCounter = $bCounter + 1;
  	}
  		
  }
    print_r($common);
}

$testA = array( 1 => 1,3,5,7,9);
$testB = array( 1 => 1,2,3,4,5,6);
$testC = array( 1 => 1);
$testD = array( 1 => 3,5,7,8,11,24,54,120);
$testE = array( 1 => 5);

Compare($testA,$testB);//result should be (1,3,5)
Compare($testA,$testC);//result should be ()
Compare($testA,$testD);//result should be (3,5,7,8,120)
Compare($testC,$testD);//result should be ()
Compare($testA,$testE);//result should be (5)

