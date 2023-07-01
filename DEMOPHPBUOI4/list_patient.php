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
    require_once("connectdb.php");
    $sql = "SELECT * FROM patienttb";
    $result = $con->query($sql);
if(isset($_POST['asc'])){
    $sql = "SELECT * FROM patienttb ORDER BY name ASC";
    $result = $con->query($sql);
}
if(isset($_POST['desc'])){
    $sql = "SELECT * FROM patienttb ORDER BY name DESC";
    $result = $con->query($sql);
}

    
    
?>
    <div class="container mt-3">
        <h2>Patient List</h2>
        <form method="POST">
        <button type="submit" name="asc" class="btn btn-primary">ASC</button>
        <button type="submit" name="desc" class="btn btn-primary">DESC</button>

        </form>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
        if($result->num_rows > 0){
            foreach ($result as $patient ) {?>
                <tr>
                    <td><?php echo $patient['id']?></td>
                    <td><?php echo $patient['name']?></td>
                    <td><?php echo $patient['gender']?"Male":"Female" ?></td>
                    <td><?php echo $patient['address']?></td>
                    <td><?php echo $patient['status']?></td>
                    <td><?php echo $patient['date']?></td>
                    <td><a onclick = "return confirm('Are you sure to delete this?')" href = "delete_patient.php?id=<?php echo $patient['id']?>" class="btn btn-danger">Delete</a></td>
                    <td><a href = "update.php?id=<?php echo $patient['id']?>" class="btn btn-danger">Update</a></td>
                </tr>
                <?php };
        }?>
            </tbody>
        </table>
    </div>
</body>

</html>