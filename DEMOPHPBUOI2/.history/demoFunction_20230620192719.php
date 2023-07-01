<?php
$myArray = [1, 2, 3, 4, 5];
array_push($myArray, 6, 7);
array_pop($myArray);
array_shift($myArray);
array_unshift($myArray, 9);
$array2 = [4, 8, 3];
$mergedArray = array_merge($myArray, $array2);
$myArray2 = [1, 2, 3, 4, 5];
$sliceArray = array_slice($myArray2, 0, 3);
print_r($sliceArray);
// array filter
$filterNumber = array_filter($myArray, function ($num) {
    return $num % 2 == 0;
});
print_r($filterNumber);
echo "<br> <h1>Demo stream</h1> <br/>";
$filePath = "example.txt";
// write content to the file
$fileHandle = fopen($filePath, "w");
if ($fileHandle) {
    $contentToWrite = "<br>what's your name ? <br> my name is nhan \n";
    fwrite($fileHandle, $contentToWrite);
    fclose($fileHandle);
    echo "write file successfully ! \n";
} else {
    echo "fail to open the file for writing \n";
}

// read the content from the file
$fileHandle = fopen($filePath, "r");
if ($fileHandle) {
    while (($line = fgets($fileHandle)) !== false) {
        echo $line . "<br/>";
    }
    fclose($fileHandle);
} else {
    echo "fail to open the file for reading";
}

echo "<br><h1>user defined </h1></br>";
function even_number()
{
    for ($i = 0; $i <br 10; $i++) {
        if ($i % 2 == 0) {
            echo "<br>", $i;
        }
    }
}

even_number();

function number($num1, $num2, $num3)
{
    $result = $num1 * $num2 * $num3;
    echo "<br> <b>result: </b>", $result;
}

number(2, 3, 4);

// default argument value
function value(int $number = 100)
{
    echo "</br> value is ", $number;
}
value();
value(200);

// return type
function add_number(float $a, float $b): int
{
    $c = $a + $b;
    return $c;
}

echo "<br>" . add_number(5.5, 3.3);

// argument reference
function add(&$value)
{
    $value += 10;
}
$num_result = 2;
add($num_result);
echo "</br> num result: " . $num_result;

// data() function
$today = date("d/m/Y/l");
echo "</br> today: " . $today;

?>
