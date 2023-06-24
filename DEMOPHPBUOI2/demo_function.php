<?php
$myArray = [1,2,3,4,5];
//thêm phần từ vào mảng
array_push($myArray,6,7);
//xóa phần tử cuối mảng
array_pop($myArray);
//xóa phần tử đầu mảng
array_shift($myArray);
array_unshift($myArray,9);
// print_r($myArray);
//mere array
$array2 = [4,8,3];
$mereArray = array_merge($myArray,$array2);
//print_r($mereArray);
$myArray2 = [1,2,3,4,5];
$sliceArray = array_slice($myArray2,0,3);
//print_r($sliceArray);
//array Filter 
$filterNumbers = array_filter($myArray2,function($num){
    return $num%2 == 0;
});
//print_r($filterNumbers);
echo "</br>Demo Stream </br>";
$filePath = "example.txt";
//write content to the file
$fileHandle = fopen($filePath,'w');
if($fileHandle){
    $contentToWrite = "What your name! \n";
    $contentToWrite2 = "My Name is supperman! \n";
    fwrite($fileHandle,$contentToWrite);
    fwrite($fileHandle,$contentToWrite2);
    fclose($fileHandle);
    echo "Write file successfully. \n";
}else{
echo "Fail to open the file for writing. \n";
}
//read the contend from the file
$fileHandle = fopen($filePath,'r');
if($fileHandle){
while (($line = fgets($fileHandle)) !== false) {
    echo $line. "</br>";
}
fclose($fileHandle);
}else{
    echo "Fail to open the file for reading. \n";
}
echo "User defined. \n";
function even_number(){
    for ($i=0; $i <10; $i++) { 
     if($i%2 == 0){
        echo "</br> ",$i;
     }
    }
}
even_number();
//Arguments and parameters
function number($num1,$num2,$num3){
    $result = $num1*$num2*$num3;
    echo "</br> result: ",$result;

}
number(2,3,4);
//default argument Value;
function value(int $number = 100){
echo "</br> value is ", $number;
}
value();
value(200);
//return type
function add_number(float $a, float $b):int{
$c = $a + $b;
return $c;
}
echo "</br> ",add_number(5.5,3.3);
//Argument reference
function add(&$value){
$value += 10;
}
$num_result = 2;
add($num_result);
echo "</br> num_result ", $num_result;

//data() function
$today = date("d/m/Y/l");
echo "<br/> today is: ", $today;
//time() function
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = date("h:i:sA");
echo "<br/> time is: ", $time;
?>