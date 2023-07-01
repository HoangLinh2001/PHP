<?php
class MyClass {
    public function myMethod() {
        $numArgs = func_num_args();
        
        if ($numArgs == 1) {
            $arg1 = func_get_arg(0);
            // Xử lý một trường hợp đối số
            echo "Một đối số: $arg1";
        } elseif ($numArgs == 2) {
            $arg1 = func_get_arg(0);
            $arg2 = func_get_arg(1);
            // Xử lý hai trường hợp đối số
            echo "Hai đối số : $arg1, $arg2";
        } else {
            // Xử lý các trường hợp khác
            echo "Đối số không hợp lệ";
        }
    }
}

$obj = new MyClass();

$obj->myMethod("Hello"); // Đầu ra: Một đối số: Xin chào

$obj->myMethod("Hello", "World"); // Đầu ra: Hai đối số: Hello, World

$obj->myMethod("Hello", "World", "!"); // Đầu ra: Đối số không hợp lệ
?>