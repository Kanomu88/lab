<?php
session_start();
$con = mysqli_connect("localhost", "root", "root", "mydb2");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $number1 = mysqli_real_escape_string($con, $_POST['number1']);
    $infom = mysqli_real_escape_string($con, $_POST['infom']);
    $room = mysqli_real_escape_string($con, $_POST['room']);

    $query = "UPDATE tbl_user2 SET firstname='$firstname', lastname='$lastname', number1='$number1', infom='$infom', room='$room' WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: LAB11_MAMP.php");
    } else {
        $_SESSION['status'] = "Data Not Updated";
        header("Location: LAB11_MAMP.php");
    }
} else {
    $_SESSION['status'] = "Invalid request!";
    header("Location: LAB11_MAMP.php");
}
?>
