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
    $email = "";
    $password = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!empty($email) && !empty($password)) {
            $selectQuery = "SELECT * FROM usertb WHERE email = ? AND password = ?";
            $stmt = $con->prepare($selectQuery);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $user = $stmt->get_result();
            $result = $user->fetch_assoc();
            $stmt->close();
            if ($user->num_rows > 0) {
                $_SESSION['email'] = $result['email'];
                $_SESSION['name'] = $result['name'];
                $_SESSION['role'] = $result['role'];
                if ($result['role'] == "Admin") {
                    header("Location: list_user.php");
                } else {
                    header("Location: detail_user.php");
                }
                exit();
            }
        }

    }
    ?>
    <div class="container mt-3">
        <h2>Login form</h2>
        <form method="POST">
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>