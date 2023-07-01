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
    include_once("connectdb.php");
    $price = 0;
    $name = $description = $image = "";
    $nameErr = $priceErr = $descriptionErr = $imageErr = "";

    if (isset($_GET['id'])) {
        $editId = $_GET['id'];
        // Fetch the product for editing
        $query = "SELECT * FROM producttb WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $editId);
        $stmt->execute();
        $result = $stmt->get_result();
        $pro = $result->fetch_assoc();
        $stmt->close();
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        if (empty($_POST['name'])) {
            $nameErr = "name is required";
        } else {
            $name = $_POST['name'];
        }

        if (empty($_POST['price'])) {
            $priceErr = "price is required";
        } else {
            if (is_numeric($_POST['price'])) {
                if ($_POST['price'] < 0 || $_POST['price'] > 2000) {
                    $priceErr = "price must be between 0 and 2000";
                }
                $price = $_POST['price'];
            } else {
                $priceErr = "price must be number";
            }
        }

        if (empty($_POST['description'])) {
            $descriptionErr = "description is required";
        } else {
            $description = $_POST['description'];
        }

        if (empty($_FILES['image']['name'])) {
            $imageErr = "image is required";
        } else {
            //$image = $_POST['image'];
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) { // không có lỗi
                $image_name = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                // đường dẫn để lưu tệp hình ảnh
                $image_path = "upload/" . $image_name;
                move_uploaded_file($image_tmp, $image_path);
                $image = $image_path;
            } else {
                $imageErr = "error uploading image file";
            }
        }

        if (empty($nameErr) && empty($priceErr) && empty($descriptionErr) && empty($imageErr)) {
            $updateQuery = "UPDATE producttb SET name = ?, price = ?, description = ?, image = ? WHERE id = ?";
            $stmt = $con->prepare($updateQuery);
            $stmt->bind_param("sdssi", $name, $price, $description, $image, $editId);
            $stmt->execute();
            $stmt->close();
            header("Location: list_product.php");
            exit();
        }
    }
    ?>
    <div class="container mt-3">
        <h2>update form</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" value="<?php echo $product['id'] ?>" name="id">
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                    value="<?php echo $pro['name'] ?>">
                <span class="text-danger">
                    <?php echo $nameErr ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" placeholder="Enter price" name="price"
                    value="<?php echo $pro['price'] ?>">
                <span class="text-danger">
                    <?php echo $priceErr ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" placeholder="Enter description"
                    name="description" value="<?php echo $pro['description'] ?>">
                <span class="text-danger">
                    <?php echo $descriptionErr ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" placeholder="Enter image" name="image"
                    value="<?php echo $pro['image'] ?>">
                <span class="text-danger">
                    <?php echo $imageErr ?>
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
</body>

</html>