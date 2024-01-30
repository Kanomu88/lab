<?php
session_start();
$con = mysqli_connect("localhost","root","root","mydb2");

if(isset($_POST['insert_data']))
{
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $number1 = mysqli_real_escape_string($con, $_POST['number1']);
    $infom = mysqli_real_escape_string($con, $_POST['infom']);
    $room = mysqli_real_escape_string($con, $_POST['room']);

    $query = "INSERT INTO tbl_user2 (firstname,lastname,number1,infom,room) VALUES ('$firstname','$lastname','$number1','$infom','$room') ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Inserted Successfully";
        header("Location: LAB11_MAMP.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: LAB11_MAMP.php");
    }
}

?>      