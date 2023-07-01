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
$email = $qoh = $card_name ="";
session_start();
if(isset($_SESSION["s_email"]) && isset($_SESSION["s_qoh"])){
    $email = $_SESSION["s_email"];
    $qoh = $_SESSION["s_qoh"];
    //remove session
    // unset($_SESSION["s_email"]);
    // unset($_SESSION["s_qoh"]);
    //cac ban ve xu ly tiep cho vui

}
?>
<div class="container mt-3">
  <h2>Payment form</h2>
  <form method = "post">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" readonly class="form-control" id="email" 
      value = "<?php echo $email?>" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="qoh">Qoh:</label>
      <input type="number" readonly class="form-control" id="qoh" 
      value = "<?php echo $qoh?>" placeholder="Enter qoh" name="qoh">
    </div>
    <div class="mb-3">
      <label for="card_name">Card Name:</label>
      <input type="text" class="form-control" id="card_name" 
      value = "<?php echo $card_name?>" placeholder="Enter card_name" name="card_name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
