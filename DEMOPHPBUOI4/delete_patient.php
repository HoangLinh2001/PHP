<?php
    include_once("connectdb.php");
    if(isset($_GET['id'])){
        $deleteId = $_GET['id'];
        $deleteQuery = "DELETE FROM patienttb WHERE id = ?";
        $stmt = $con->prepare($deleteQuery);
        $stmt->bind_param("i",$deleteId);
        $stmt->execute();
        $stmt->close();
        header("Location: list_patient.php");
        exit();
    }
?>