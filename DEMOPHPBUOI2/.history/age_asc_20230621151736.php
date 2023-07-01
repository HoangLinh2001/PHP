<?php
require_once('connectdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];

    // Perform the update query
    $sql = "UPDATE emptb SET name='$name', email='$email', password='$password', age='$age' WHERE id=$id";
    $result = $con->query($sql);

    if ($result) {
        // Redirect to the employee list page
        header("Location: list_employee.php");
        exit();
    } else {
        echo "Error updating employee: " . $con->error;
    }
} else {
    // Retrieve the employee details and sort by age in ascending order
    $sql = "SELECT * FROM emptb ORDER BY age ASC";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $employees = array();
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }
    } else {
        echo "No employees found.";
        exit();
    }
}
?>
