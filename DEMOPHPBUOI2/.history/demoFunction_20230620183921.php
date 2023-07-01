<?php
$myArray = [1, 2, 3, 4, 5];
array_push($myArray, 6, 7);
array_pop($myArray);
array_shift($myArray);
array_unshift($myArray, 9);
$array2 = [4, 8, 3];
$mereArray = array_merge($myArray, $array2);
$myArray2 = [1, 2, 3, 4, 5];
$sliceArray = array_slice($myArray2, 0, 3);
print_r($sliceArray);
// array filter
$filterNumber = array_filter($myArray, function ($num) {
    return $num % 2 == 0;
});
print_r($filterNumber);
echo "<br/> Demo stream";

?>