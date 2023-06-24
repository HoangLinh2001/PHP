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
        .create-filter-employee a{
            margin-left: 1rem;
        }

        .create-filter-employee .search-form{
            margin-left: 2rem;
        }
    </style>
</head>

<body>
    <?php
    require_once('connectdb.php');
    $sql = "SELECT * FROM emptb ORDER BY age DESC";
    $result = $con->query($sql);
    ?>
    <div class="container mt-3">
    <a href="list_employee.php" style="text-decoration: none;">
        <h2 style="margin: 0;">Employee List</h2>
    </a>
        <div class="create-filter-employee">
            <a class="btn btn-primary" href="create_employee.php">Create a new employee</a>
            <a class="btn btn-primary" href="age_asc.php">Age tăng dần</a>
            <a class="btn btn-primary" href="age_desc.php">Age giảm dần</a>
            <form action="search_name.php" method="GET" class="search-form">
                <input type="text" name="search_name" placeholder="Enter name" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
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
                if ($result->num_rows > 0) {
                    foreach ($result as $item) {
                ?>
                        <tr>
                            <td><?php echo $item['id'] ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['email'] ?></td>
                            <td><?php echo $item['password'] ?></td>
                            <td><?php echo $item['age'] ?></td>
                            <td>
                                <a class="btn btn-danger" href="delete_employee.php?id=<?php echo $item['id'] ?>">Delete</a>
                                <a class="btn btn-primary" href="update_employee.php?id=<?php echo $item['id'] ?>">Update</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No employees found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
