<?php
function search_matrix($M,$v)
{
   
    $row = 1;
    $index = count($M[$row]);
    $flag = false;
    $size = count($M[$row]); // the size of the matrix
    while ($row <= count($M[$row]) && $index >= 1) {
        if ($v < $M[1][1]){
           break;
        }
        else if ($v > $M[$size][$size]){
            break;
        }
        else {
          if ($v == $M[$row][$index]){
                $flag = true;
                 break;
            }
            else if ($v > $M[$row][$index]){
                $row = $row +1;
            }
            else {
                $index = $index -1;
            }
        }
    }
  
    return $flag;
}

$N = 9;
$matrix = array( 1 => array( 1 =>  16, 29, 48, 68, 89, 97,112,120,124 ),
                 2 => array( 1 =>  31, 43, 57, 70, 92,100,117,127,128 ),
                 3 => array( 1 =>  45, 65, 94,123,133,151,165,191,196 ),
                 4 => array( 1 =>  60, 95,111,133,155,176,186,208,211 ),
                 5 => array( 1 =>  80,125,155,182,193,219,233,261,274 ),
                 6 => array( 1 => 102,140,181,192,220,241,259,281,282 ),
                 7 => array( 1 => 121,154,204,224,245,265,285,295,301 ),
                 8 => array( 1 => 144,182,218,250,261,287,300,315,330 ),
                 9 => array( 1 => 146,186,226,255,267,297,390,415,430 )
            );


if( ! array_key_exists(1,$argv) || ! is_numeric($argv[1]) )
    exit("Expected as command line argument to see a number to seek in the matrix\n");

// grab command line argument, search in matrix
$v = $argv[1];

// search matrix and report results
if( search_matrix($matrix,$v) )
    echo "Found it!\n";
else
    echo "Not in matrix\n";

    
?>