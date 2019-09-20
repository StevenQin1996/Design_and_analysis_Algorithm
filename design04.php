<?php


//test cases start
$array1 =  array(1=>9, 12, 16, 18, 15, 17, 8, 10, 6, 5, 14 );
$array2 =  array(1=>9, 12, 16, 15, 17, 8, 10, 6, 5, 14 );
$array3 =  array(1=>9, 12, 16, 15, 8, 10, 6, 5, 14 );
$array4 =  array(1=>9, 12, 15, 8, 6, 5, 14 );
$array5 =  array(1=>1, 2, 3 );
$array6 =  array(1=>5, 4, 3);
$array7 =  array(1=>2, 1);
$array8 =  array(1=>1, 2);
$array9 =  array(1=>1);
localMax($array1);
localMax($array2);
localMax($array3);
localMax($array4);
localMax($array5);
localMax($array6);
localMax($array7);
localMax($array8);
localMax($array9);
// end

function localMax($A)
{
   $mid = ceil(count($A)/2);
   $head = 1;
   $tail = count($A); 
   
   while ($head < $tail){
        if (($tail - $head) == 1){
            if ($A[$tail] > $A[$head]){
                $mid = $tail;
            }
            else{
                $mid = $head;
            }
            break;
        }
        else{
            if($A[$mid] < $A[$mid-1]){
                
                $tail = $mid - 1;
            }
            elseif($A[$mid] < $A[$mid+1]){
                $head = $mid + 1;
            }
            else    
                break;
            $mid = ceil(($head + $tail) /2); 
        } 
        
   }
   echo "this is my local max: ", $A[$mid], ", [", $mid,"]\n";
}

?>

