<?php


function acronymCheck ($passList)
{
    $acronym = $passList[0];
    $countAcronym = strlen($acronym);

    $title = strtoupper($passList[1]);
    $Name = explode(" ", $title);
    array_unshift($Name, "random");
    unset($Name[0]);
    $totalRow = count($Name);
    $exceptionList = ["A","AN","AND","FOR","IN","OF","THE","OR","TO"];
    
    $totalColumn = pow(2,$countAcronym-1)-1;
    //echo $totalColumn, "\n";
    for($countRow = 0; $countRow <= $totalRow; $countRow++)
    {
    	for ($countColumn= 0; $countColumn<=$totalColumn; $countColumn++)
	    {
	    	$result[$countRow][$countColumn] = "FALSE";

	    }
    }
	$result[0][0] = $countAcronym;
	$howmanyletterleft = $result[0][0];
    for ($row = 1; $row <= $totalRow; $row++)// check if each word in $Name contain at least one element from the acronym
    { 
		for ($countColumn = 0; $countColumn<=$totalColumn; $countColumn++)//check how many elements in acronym is in the current word. 
		{
    		if(in_array($Name[$row],$exceptionList))// copy data to the next row
	    	{
	    		$result[$row][$countColumn]=$result[$row-1][$countColumn];
	    	}
    		//echo ">>>>>>> ", $countColumn, "\n";
    		if($result[$row-1][$countColumn] != "FALSE") // look up
			{
				$howmanyletterleft = $result[$row-1][$countColumn];
				//echo $howmanyletterleft, "\n";
				for($temp = 0; $temp < strlen($Name[$row]); $temp ++)// search through the rest of the word
				{
					//echo "<<<<<<<<<<<<<<<<<<<< temp: ",$temp, "\n";
					if ($howmanyletterleft > 0)
					{
						//echo "<<<<<<<<<<<<< before: ",$howmanyletterleft, "\n";
						if ($Name[$row][$temp] == $acronym[$countAcronym-$howmanyletterleft])
						{
							//echo "<<<<<<<<<<<<<<<<<<<< ",$acronym[$countAcronym-$howmanyletterleft], "\n";
							//echo "<<<<<<<<<<<<<<<<<<<< ",$Name[$row][$temp], "\n";
							//echo "<<<<<<<<<<<<<<<<<<<< ",$countColumn, "\n";
							if($result[$row-1][$countColumn] != "FALSE" && $result[$row-1][$countColumn] > 0)
							{
								$result[$row][$countColumn] = $result[$row-1][$countColumn]-1;
								$howmanyletterleft = $result[$row][$countColumn];
								//echo "<<<<<<<<<<<<< after: ",$howmanyletterleft, "\n";
								$countColumn = $countColumn + pow(2,$howmanyletterleft-1)-1;
							}
							else if ($result[$row][$countColumn-pow(2,$howmanyletterleft-1)+1] != "FALSE" && $result[$row][$countColumn-pow(2,$howmanyletterleft-1)+1] > 0)
							{
								$result[$row][$countColumn] = $result[$row][$countColumn-pow(2,$howmanyletterleft-1)+1] -1;
								$howmanyletterleft = $result[$row][$countColumn];
								//echo "<<<<<<<<<<<<< after: ",$howmanyletterleft, "\n";
								$countColumn = $countColumn + pow(2,$howmanyletterleft-1)-1;
							}
						}
					}
				}
			}		
	    }
	    
    	
    }

	//print_r($result);
    if(in_array("0", $result[$totalRow]))
    	return True;
    else 
    	return False;
}
$list[0] = ["AAAA","AAA AAA AAA AAA"];
$list[1] = ["SCUBA","self contained underwater breathing apparatus"];
$list[2] = ["RADAR","radio detection and ranging"];
$list[3] = ["JAMES","just algorithms matter in design of software"];
$list[4] = ["REEVES","drones are an EVIL in modern society"];
$list[5] = ["ee","bb ee"];


foreach($list as $tempList)
{
	$result = acronymCheck($tempList);
	if($result)
		echo "True","\n";
	else 
		echo "False", "\n";

}

?>