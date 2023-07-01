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
$email = $qoh = "";
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $qoh = $_POST["qoh"];
    if(!empty($email) && !empty($qoh)){
        $_SESSION["s_email"] = $email;
        $_SESSION["s_qoh"] = $qoh;
        //xu ly dat hang
        ///các bạn về xử lý cho vui
        header("Location: payment.php");
    }

}
?>
<div class="container mt-3">
  <h2>Order form</h2>
  <form method = "post">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" 
      value = "<?php echo $email?>" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="qoh">Qoh:</label>
      <input type="number" class="form-control" id="qoh" 
      value = "<?php echo $qoh?>" placeholder="Enter qoh" name="qoh">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
