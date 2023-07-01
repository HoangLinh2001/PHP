<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php
include_once("connectdb.php");
$sql = "SELECT * FROM producttb";
$pro = $con->query($sql);
?>
    <div class="container">
        <h2>Product Table</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if($pro ->num_rows > 0){
                    foreach ($pro as $pros) {?>
                <tr>
                    <td><?php echo $pros['id']?></td>
                    <td><?php echo $pros['name']?></td>
                    <td><?php echo $pros['price']?></td>
                    <td><?php echo $pros['description']?></td>
                    <td><img style="width: 50px;" src ="<?php echo $pros['image']?>"class = "img_thumbnail w-20"/></td>
                    <td><a href="delete.php?id=<?php echo $pros['id']?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>

</body>

</html>