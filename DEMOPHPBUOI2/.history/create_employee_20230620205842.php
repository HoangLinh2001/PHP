<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
require_once('connectdb.php');
$name = $email = $password = "";
$nameError = "";
$emailError = "";
$passwordError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra và lấy giá trị từ form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Kiểm tra điều kiện và xử lý dữ liệu
    if (empty($name)) {
        $nameError = "Name is required";
    }

    if (empty($password)) {
        $passwordError = "Password is required";
    }

    // Nếu không có lỗi, thực hiện lưu dữ liệu vào cơ sở dữ liệu hoặc thực hiện các xử lý khác ở đây
    if (empty($nameError) && empty($passwordError)) {
        // Kết nối đến cơ sở dữ liệu
        $conn = new mysqli("localhost", "username", "password", "database_name");

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Tiến hành xử lý lưu dữ liệu vào cơ sở dữ liệu hoặc các xử lý khác
        // Ví dụ:
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Đóng kết nối
        $conn->close();
    }
}

?>

<div class="container mt-3">
  <h2>Form Create</h2>
  <form action="/action_page.php">
  <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      <span class="text-danger"><?php echo $nameError?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      <span class="text-danger"><?php echo $emailError?></span>
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      <span class="text-danger"><?php echo $passwordError?></span>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>