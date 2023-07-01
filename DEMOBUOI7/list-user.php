<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
        include_once('connectdb.php');
        session_start();
        $nameUser = "";
        $emailUser = "";
        $sql = "SELECT * FROM usertb";
        $users = $con->query($sql);
        if(isset($_SESSION['email']) && isset($_SESSION['name'])){
            $nameUser = $_SESSION['name'];
            $emailUser = $_SESSION['email'];
            if($_SESSION['role'] != "Admin"){
                header("Location: detail_user.php");
            }
        }else{
            header("Location: login.php");
        }
        ?>
    <div class="container mt-3">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><?php echo $nameUser?'Welcome Admin '.$nameUser:'No User';?></a>
                    </li>
                    <li class="nav-item">
                    <?php echo $nameUser?'<a class="btn btn-warning" href="logout.php">Logout</a> ':'<a class="btn btn-info" href="login.php">Login</a>';?>
                    </li>
                </ul>
            </div>
        </nav>
        <h2>User List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($users ->num_rows > 0){
                    foreach ($users as $user) {?>
                <tr>
                    <td><?php echo $user['id']?></td>
                    <td><?php echo $user['name']?></td>
                    <td><?php echo $user['email']?></td>
                    <td><?php echo $user['role']?></td>
                    <td><?php if($user['status']){?>
                        <a class="btn btn-success">Active</a>
                        <?php } else {?>
                        <a class="btn btn-danger">DisActive</a>
                        <?php }?>
                    </td>
                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php }
                } ?>

            </tbody>
        </table>
    </div>

</body>

</html>