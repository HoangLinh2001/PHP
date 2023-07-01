<?php
require_once('connectdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform the update query
    $sql = "UPDATE emptb SET name='$name', email='$email', password='$password' WHERE id=$id";
    $result = $con->query($sql);

    if ($result) {
        // Redirect to the employee list page
        header("Location: list_employee.php");
        exit();
    } else {
        echo "Error updating employee: " . $con->error;
    }
} else {
    // Retrieve the employee details based on the provided ID
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the employee record from the database
        $sql = "SELECT * FROM emptb WHERE id=$id";
        $result = $con->query($sql);

        if ($result->num_rows === 1) {
            $employee = $result->fetch_assoc();
        } else {
            echo "Employee not found.";
            exit();
        }
    } else {
        echo "Invalid employee ID.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <h2>Update Employee</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee['name']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $employee['password']; ?>">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">age</label>
                <input type="age" class="form-control" id="age" name="age" value="<?php echo $employee['age']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
