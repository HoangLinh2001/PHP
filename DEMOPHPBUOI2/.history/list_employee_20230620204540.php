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
$sql = "SELECT * FROM emptb";
$result = $con->query($sql);
?>
<div class="container mt-3">
  <h2>employee</h2>          
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>Email</th>
        <th>password</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if ($result->num_rows > 0) {
        foreach ($result as $item) {?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['password']; ?></td>
            </tr>
        <?php }
    } ?>
    </tbody>
  </table>
</div>

</body>
</html>