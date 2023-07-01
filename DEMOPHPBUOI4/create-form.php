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
    $name = "";
    $status = "";
    $gender = 1;
    $nameErr = "";
    $addressErr = "";
    $dataErr = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST['name'])) {
            $nameErr = "name is required";
        } else {
            $name = $_POST['name'];
        }
        if (empty($_POST['date'])) {
            $dateErr = "date is required";
        } else {
            $status = $_POST['date'];
        }
        if (empty($_POST['address'])) {
            $addressErr = "";
        } else {
            $addressErr = $_POST['address'];
        }
        if (empty($nameErr) && empty($dateErr) && empty($addressErr)) {

            $createQuery = "INSERT INTO patienttb (name,gender,status,address,date) VALUES (?,?,?,?,?)";
            $stmt = $con->prepare($createQuery);
            $stmt->bind_param("sssd", $name,$gender,$status,$address,$date);
            $stmt->execute();
            $stmt->close();
            header("Location: list_patient.php");
            exit();
        }
    }
    ?>
    <div class="container mt-3">
        <h2>Create form</h2>
        <form action="/action_page.php">
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                <span class="text-danger">
                    <?php echo $nameErr ?>
                </span>
            </div>
            <div class="form-check">
                <input type="radio" value="1" <?php if($gender ==1) echo 'checked';?> class="form-check-input" id="male" name="gender">
                <label class="form-check-label" for="male">Male:</label>
            </div>
            <div class="form-check">
                <input type="radio" value="0" <?php if($gender == 0) echo 'checked';?> class="form-check-input" id="female" name="gender">
                <label class="form-check-label" for="female">FeMale:</label>
            </div>
            <div class="mb-3">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
                <span class="text-danger">
                    <?php echo $addressErr ?>
                </span>
            </div>
            <select class="form-select" name="status" id="status">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
            </select>
            <div class="mb-3">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date">
                <span class="text-danger">
                    <?php echo $dataErr ?>
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>