<?php
require_once('connectdb.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy giá trị mới từ POST hoặc từ CSDL nếu muốn
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Câu lệnh UPDATE nhân viên trong CSDL
    $sql = "UPDATE emptb SET Name = '$name', Email = '$email', Password = '$password' WHERE id = $id";
    $result = $con->query($sql);

    if($result) {
        // Cập nhật thành công, chuyển hướng về trang danh sách nhân viên
        header('Location: list_employee.php');
        exit();
    } else {
        // Cập nhật thất bại, thông báo lỗi
        echo "Error updating employee: " . $con->error;
    }
} else {
    // Không có thông tin nhân viên cần cập nhật, chuyển hướng về trang danh sách nhân viên
    header('Location: list_employee.php');
    exit();
}
?>
