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

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST['name'])) {
            $nameError = "name is error";
        }
        else{
            $name = $_POST['name'];
        }
        if (empty($_POST['email'])) {
            $nemailError = "email is error";
        }else {
            $email = $_POST['email'];
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format";
            }
        }
        if (empty($_POST['password'])) {
            $nemailError = "password is error";
        }
        else{
            $password = $_POST['password'];
        }
    }
    //insert into mysql
    if (empty($nameError) && empty($emailError && empty($passwordError))) {
        $createQuery = "INSERT INTO emptp(name,email,ppassword) VALUES (?,?,?)";
        $stmt = $con->prepare($createQuery);
        $stmt->bind_param("sss",$name,$email,$password);
        $stmt->execute();
        $stmt->close();
        header("Location: list_employee.php");
        exit();
    }
}

?>

<div class="container mt-3">
  <h2>Form Create</h2>
  <form method="post">
  <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" value="<?php echo $name?>" placeholder="Enter name" name="name">
      <span class="text-danger"><?php echo $nameError?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="<?php echo $email?>" placeholder="Enter email" name="email">
      <span class="text-danger"><?php echo $emailError?></span>
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" value="<?php echo $password?>" placeholder="Enter password" name="password">
      <span class="text-danger"><?php echo $passwordError?></span>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>