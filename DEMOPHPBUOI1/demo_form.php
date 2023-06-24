<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php $nameError = $emailError = $passwordError = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Form validation
        if (empty($_POST["name"])) {
            $nameError = "Name is required";
        } else {
            $name = $_POST["name"];
        }

        if (empty($_POST["email"])) {
            $emailError = "Email is required";
        } else {
            $email = $_POST["email"];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format";
            }
        }

        if (empty($_POST["password"])) {
            $passwordError = "Password is required";
        } else {
            $password = $_POST["password"];
        }
    }
    ?>

    <div class="container">
        <form method="post" class="col-sm-8">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>"
                    class="form-control" name="name" id="name" placeholder="Enter name" />
                <span class="text-danger">
                    <?php echo isset($nameError) ? htmlspecialchars($nameError) : ''; ?>
                </span>
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"
                    class="form-control" name="email" id="email" placeholder="Enter email" />
                <span class="text-danger">
                    <?php echo isset($emailError) ? htmlspecialchars($emailError) : ''; ?>
                </span>
            </div>

            <div class="mb-3 mt-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" value="<?php echo isset($password) ? htmlspecialchars($password) : ''; ?>"
                    class="form-control" name="password" id="pwd" placeholder="Enter password" />
                <span class="text-danger">
                    <?php echo isset($passwordError) ? htmlspecialchars($passwordError) : ''; ?>
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>