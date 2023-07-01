<?php
class MathUtils
{
    public static $pi = 3.14;

    public static function square($num)
    {
        return $num * $num;
    }
}

// Truy cập vào thuộc tính tĩnh
echo MathUtils::$pi; // Output: 3.14
echo “ < br > ”;
// Gọi phương thức tĩnh
echo MathUtils::square(5); // Output: 25
?>