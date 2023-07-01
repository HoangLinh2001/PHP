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
    require_once("connectdb.php");
    $sql = "SELECT * FROM producttb";
    $result = $con->query($sql);
    $nameSeach = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["name"])) {
            $nameSeach = $_GET["name"];
            $query = "SELECT * FROM producttb WHERE name LIKE ?";
            $stmt = $con->prepare($query);
            $searchParam = '%' . $nameSeach . '%';
            $stmt->bind_param("s", $searchParam);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
        }
    }
    ?>
    <div class="container mt-3">
        <?php
        include("layout/header.php");
        ?>
        <form method="get">
            <div class="mb-3 mt-3">
                <label for="name">Name Search:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name to search" name="name"
                    value="<?php echo $nameSeach ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <h2>List Product</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qoh</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result-> num_rows > 0) {
                    foreach ($result as $item) { ?>
                        <tr>
                            <td>
                                <?php echo $item['Id'] ?>
                            </td>
                            <td>
                                <?php echo $item['Name'] ?>
                            </td>
                            <td>
                                <?php echo $item['Price'] ?>
                            </td>
                            <td>
                                <?php echo $item['Qoh'] ?>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </tbody>
        </table>
        <?php
        include("layout/footer.php");
        ?>
    </div>

</body>

</html>