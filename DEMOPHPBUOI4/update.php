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
    $address = "";
    $gender = 1;
    $date = "";
    $nameErr = "";
    $addressErr = "";
    $dateErr = "";
    if (isset($_GET['id'])) {
        $editId = $_GET['id'];
        // Fetch the product for editing
        $query = "SELECT * FROM patienttb WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $editId);
        $stmt->execute();
        $result = $stmt->get_result();
        $patient = $result->fetch_assoc();
        $stmt->close();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];
        echo "gender ", $gender;
        //Form Validate
        if (empty($_POST['name'])) {
            $nameErr = "Name is required";
        } else {
            $name = sanitary_data($_POST['name']);
        }
        if (empty($_POST['address'])) {
            $addressErr = "Address is required";
        } else {
            $address = sanitary_data($_POST['address']);
        }
        if (empty($_POST['date'])) {
            $dateErr = "Date is required";
        } else {
            $date = $_POST['date'];
        }

        // Create operation
        if (empty($nameErr) && empty($addressErr) && empty($dateErr)) {
            $updateQuery = "UPDATE patienttb SET name = ?, gender= ?,
        address= ?,status = ?,date = ? WHERE id = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("sisssi", $name, $gender, $address, $status, $date, $id);
            $stmt->execute();
            $stmt->close();
            header("Location: list_patient.php");
            exit();
        }
    }
    function sanitary_data($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
    ?>
    <div class="container mt-3">
        <h2>Update Patient</h2>
        <a href="list_patient.php" class="btn btn-primary">
            List Patient</a>
        <form method="post">
            <input type="hidden" class="form-control" value="<?php echo $patient['id'] ?>" name="id">
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" value="<?php echo $patient['name'] ?>" placeholder="Enter name" name="name">
                <span class="text-danger">
                    <?php echo $nameErr ?>
                </span>
            </div>
            <div class="form-check"><input type="radio" class="form-check-input" id="male" name="gender"
                    <?php if ($patient['gender'] == 0) echo 'checked'; ?>
                     value="0" checked>Male
                <label class="form-check-label" for="male"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="female" name="gender"
                    <?php if ($patient['gender'] == 1) echo 'checked'; ?> 
                    value="1">Female
                <label class="form-check-label" for="female"></label>
            </div>
            <div class="mb-3 mt-3">
                <label for="address">Address:</label>
                <input type="text" class="form-control" value=
                    "<?php echo $patient['address'] ?>"
                    placeholder="Enter Address" name="address">
                <span class="text-danger"><?php echo $addressErr?></span>
            </div>
            <select class="form-select" name="status" id="status">
                <option value="Single" <?php if ($patient['status'] === 'Single')
                 echo 'selected'; ?>>Single</option>
                <option value="Married" <?php if ($patient['status'] === 'Married') 
                echo 'selected'; ?>>Married</option>
                <option value="Divorced" <?php if ($patient['status'] === 'Divorced')
                 echo 'selected'; ?>>Divorced
                </option>
                <option value="Widowed" <?php if ($patient['status'] === 'Widowed')
                 echo 'selected'; ?>>Widowed</option>
            </select>
            <div class="mb-3 mt-3">
                <label for="address">Date:</label>
                <input type="date" class="form-control" name="date" id="date"
                    value="<?php echo date('Y-m-d', strtotime($patient['date'])); ?>">
                <span class="text-danger"><?php echo $dateErr?></span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>