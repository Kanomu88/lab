<?php
session_start();
$con = mysqli_connect("localhost", "root", "root", "mydb2");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM tbl_user2 WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['status'] = "Data not found!";
        header("Location: LAB11_MAMP.php");
        exit();
    }
} else {
    $_SESSION['status'] = "Invalid request!";
    header("Location: LAB11_MAMP.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Data</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="mb-3">
            <label for="firstname" class="form-label">Firstname</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="number1" class="form-label">Number</label>
            <input type="number" class="form-control" id="number1" name="number1" value="<?php echo $row['number1']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="infom" class="form-label">Major</label>
            <input type="text" class="form-control" id="infom" name="infom" value="<?php echo $row['infom']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="room" class="form-label">Class</label>
            <input type="number" class="form-control" id="room" name="room" value="<?php echo $row['room']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
