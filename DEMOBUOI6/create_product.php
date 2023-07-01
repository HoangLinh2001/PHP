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
   require_once('connectdb.php'); 
    $name = "";
    $price = "";
    $description = "";
    $image = "";
    $nameErr = "";
    $priceErr = "";
    $descriptionErr = "";   
    $imageErr = "";
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        if (empty($_POST['name'])) {
            $nameErr = "name is required";
        } else {
            $name = $_POST['name'];
        }
        if (empty($_POST['price'])) {
            $priceErr = "price is required";
        } else {
            if ($_POST['price'] < 0 || $_POST['price'] > 2000) {
                $priceErr = "Price must be between 0 to 2000";
            }
            $price = $_POST['price'];
        }
        if (empty($_POST['description'])) {
            $nameErr = "description is required";
        } else {
            $description = $_POST['description'];
        }
        if (empty($_FILES['image']['name'])) {
            $imageErr='img is required';
        }else{
            if ($_FILES['image']['error']==UPLOAD_ERR_OK) {
                $image_name = $_FILES['image']['name'];
                $image_tpm = $_FILES['image']['tmp_name'];

                $image_path='upload/'.strtotime(date("d.m.Y.h:i:sa")).$image_name;
                move_uploaded_file($image_tpm,$image_path);
                $image = $image_path;
            }else{
                $imageErr="Error upload image file";
            }
        }
        //INSERT
        if (empty($nameErr) && empty($priceErr) && empty($descriptionErr) && empty($imageErr)) {

            $createQuery = "INSERT INTO producttb (name,price,description,image) VALUES (?,?,?,?)";
            $stmt = $con->prepare($createQuery);
            $stmt->bind_param("sdss", $name, $price, $description, $image);
            $stmt->execute();
            $stmt->close();
            header("Location: list-product.php");
            exit();
        }
    }
    ?>
    <div class="container mt-3">
        <h2>Create Form</h2>
        <form action="post" enctype=multipart/form-data>
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                <span class="text-bg-danger"><?php echo $nameErr ?></span>
            </div>
            <div class="mb-3 mt-3">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" placeholder="Enter price" name="price">
                <span class="text-bg-danger"><?php echo $priceErr ?></span>
            </div>
            <div class="mb-3 mt-3">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" placeholder="Enter description"
                    name="description">
                    <span class="text-bg-danger"><?php echo $descriptionErr ?></span>
            </div>
            <div class="mb-3 mt-3">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <span class="text-bg-danger"><?php echo $imageErr ?></span>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>