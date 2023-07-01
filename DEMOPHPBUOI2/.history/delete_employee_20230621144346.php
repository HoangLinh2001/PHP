<?php
require_once('connectdb.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa nhân viên từ CSDL
    $sql = "DELETE FROM emptb WHERE id = $id";
    $result = $con->query($sql);

    if($result) {
        // Xóa thành công, chuyển hướng về trang danh sách nhân viên
        header('Location: employee_list.php');
        exit();
    } else {
        // Xóa thất bại, thông báo lỗi
        echo "Error deleting employee: " . $con->error;
    }
} else {
    // Không có thông tin nhân viên cần xóa, chuyển hướng về trang danh sách nhân viên
    header('Location: employee_list.php');
    exit();
}
?>
