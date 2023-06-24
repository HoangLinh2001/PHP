<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // variable
    $name = "Hong Han";
    $age = 18;
    $isBoss = false;
    $isMariage = false;
    echo $name . " tuoi la: " . $age . " ", ($isBoss ? "Sếp" : "Culi"),
        ($isMariage ? " Đã có gia đình rồi" : " Ai đó yêu tôi đi");
    //String type and some method
    $message = "Nam Mo a di da phat";
    echo "<br/> message co do dai la: " . strlen($message);
    echo "<br/> chuyen message thanh uppercase: " . strtoupper($message);
    echo "<br/> chuyen message thanh lowercase: " . strtolower($message);
    echo "<br/> substr cua message la: " . substr($message, 3, 8);
    $words = explode(" ", $message);
    echo "<br/> tach chuoi message thanh mang : ";
    print_r($words);
    echo "<br/> tim vi tri chu d dau tien trong chuoi message la: "
        . strpos($message, "d");

    //demo array
    //1. index array
    $numbers = array(1, 2, 3, 4, 5, 6);
    echo
        //$numbers = [1,2,3,4,5,6];
        $fruits = ["Apple", "Banana", "Orange", "Mango", "Avocado"];
    echo "<br/> " . $fruits[0];
    echo "<br/> " . $fruits[1];
    echo "<br/> " . $fruits[2];
    echo "<br/> " . $fruits[3];
    $fruits[1] = "West Banana";
    echo "<br/> " . $fruits[1];
    $filterFruits = array_filter($fruits, function ($value) {
        return (strtolower(substr($value, 0, 1)) === "a");
    });
    print_r($filterFruits);
    //demo loop for index array
    echo "<h1>Demo loop for index array</h1>";
    for ($i = 0; $i < count($numbers); $i++) {
        echo $numbers[$i] . "<br/>";
    }
    //2.Associative Array
    $person = ["name" => "Nhan", "age" => 18, "isStudent" => true];
    //$person = array("name"=>"Nhan", "age"=>18,"isStudent"=>true);
    foreach ($person as $key => $value) {
        echo "Key: " . $key . "- Value " . $value . "<br/>";
    }
    //3.Mutidimentional Arays
    $matrix = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9],
    ];
    foreach ($matrix as $innerArray) {
        foreach ($innerArray as $value) {
            echo $value . " ";
        }
        echo "<br/>";
    }
    //while
    echo "<h2>while loop demo</h2>";
    $i = 0;
    while ($i <= count($numbers)) {
        echo "$numbers[$i] <br/>";
        $i++;
    }
    echo "<h2>do while loop demo</h2>";
    $a = 0;
    do {
        echo "$numbers[$a] <br/>";
        $a++;
    } while ($a <= count($numbers));
    
    ?>
</body>

</html>