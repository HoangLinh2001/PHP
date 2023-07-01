<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .create-filter-employee{
            display: flex;
        }
    </style>
</head>

<body>
    <?php
require_once('connectdb.php');
$sql = "SELECT * FROM emptb";
$result = $con -> query($sql);
?>
    <div class="container mt-3">
        <h2>Employee List</h2>
    <div class="create-filter-employee">
        <a class="btn btn-primary" href="create_employee.php">Create a new employee</a>
        <a class="btn btn-primary" href="create_employee.php">filter by age</a>
    </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
        if($result -> num_rows > 0){ 
          foreach ($result as $item) {?>
                <tr>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['email'] ?></td>
                    <td><?php echo $item['password'] ?></td>
                    <td><?php echo $item['age'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="delete_employee.php?id=<?php echo $item['id']?>">Delete</a>
                        <a class="btn btn-primary" href="update_employee.php?id=<?php echo $item['id']?>">update</a>
                    </td>
                </tr>
                <?php }; ?>
                <?php }; ?>


            </tbody>
        </table>
    </div>

</body>

</html>