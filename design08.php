<?php

// return the smallest factor of $n less than $n
function distinct($n)
{
    if( $n > 2 and $n % 2 == 0 )
        return 2;
    $sn = sqrt($n);
    for( $k = 3; $k <= $sn; $k+=2 )
        if( $n % $k == 0)
            return $k;
    return $n;
}

function factor_factorials($n)
{
	$distinctFactor = 0;
	$totalFactor = 0;
	
	$count = array();// count remembers all the total factors number up to $n-1
    
	for( $i = 2; $i <= $n; $i++ ){
		if( distinct($i) == $i ) // if the smallest factor is i self
		{
			$distinctFactor++;
			$totalFactor++;
			$count[$i] = 1;
		}
		else // i divide by the smallest factor
		{
			$count[$i] = $count[$i/distinct($i)] + 1; 
			
			$totalFactor += $count[$i];
		}
		//echo str_pad("$count[$i]",3," ",STR_PAD_LEFT).", " ;
	}
	//print_r(array($distinctFactor,$totalFactor));
	return array($distinctFactor,$totalFactor);
}

// testing : in a good implementation, this range should output within ~5 seconds
foreach( range(4,3000) as $n )
{
   list($distinct,$total) = factor_factorials($n);
   echo str_pad("$n",4," ",STR_PAD_LEFT)." : ".
        str_pad("$total",4," ",STR_PAD_LEFT)." total, ".
        str_pad("$distinct",3," ",STR_PAD_LEFT)." distinct factors\n";
}
