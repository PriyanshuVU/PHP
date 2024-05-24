<?php

function calculateSequence($number) {
    $sequence = array();
    $sequence[] = $number;
    
    while ($number != 1) {
        if ($number % 2 == 0) {
            $number = $number / 2;
        } else {
            $number = 3 * $number + 1;
        }
        $sequence[] = $number;
    }
    
    return $sequence;
}

function findMaxAndCountIterations($number) {
    $sequence = calculateSequence($number);
    
    $maxValue = max($sequence);
    $countIterations = count($sequence) - 1; // subtract 1 to exclude the initial number
    
    return array('maxValue' => $maxValue, 'countIterations' => $countIterations);
}
function Find($number){
$result = findMaxAndCountIterations($number);
$maxValue = $result['maxValue'];
$countIterations = $result['countIterations'];

echo "Sequence for $number: ";
echo "<br>";
echo implode("<br>", calculateSequence($number));
echo "<br>";
echo "Max Value: $maxValue\n";
echo "Count of Iterations: $countIterations\n";
}
?>
