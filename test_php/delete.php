<?php
session_start();
$con = mysqli_connect("localhost", "root", "root", "mydb2");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tbl_user2 WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data Deleted Successfully";
        header("Location: LAB11_MAMP.php");
    } else {
        $_SESSION['status'] = "Data Not Deleted";
        header("Location: LAB11_MAMP.php");
    }
} else {
    $_SESSION['status'] = "Invalid request!";
    header("Location: LAB11_MAMP.php");
}
?>
