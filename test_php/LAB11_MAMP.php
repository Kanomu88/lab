<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>LAB11_MAMP</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <?php
            if (isset($_SESSION['status'])) {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Now!</strong> <?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['status']);
            }
            ?>

            <div class="card mt-4">
                <div class="card-header">
                    <h4>Insert Data into Database </h4>
                </div>
                
                <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="">Firstname</label>
                                        <input type="text" name="firstname" class="form-control" required placeholder="Enter your firstname">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="">Lastname</label>
                                        <input type="text" name="lastname" class="form-control" required placeholder="Enter your lastname">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="">Number</label>
                                        <input type="number" name="number1" class="form-control" required placeholder="Enter your number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="">Major</label>
                                        <input type="text" name="infom" class="form-control" required placeholder="Enter your Major">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="">Class</label>
                                        <input type="number" name="room" class="form-control" required placeholder="Enter your room">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <button type="submit" name="insert_data" class="btn btn-primary">SAVE DATA</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                    </div>

                    <!-- Display Data Table -->
                    <div class="card-body">

                    <h3 class="mt-4">Data Table</h3>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Number</th>
                            <th>Major</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="data-table-body">
                        <?php
                        // Fetch data from the database and display it in the table
                        $con = mysqli_connect("localhost", "root", "root", "mydb2");

                        $query = "SELECT * FROM tbl_user2";
                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['number1']; ?></td>
                                <td><?php echo $row['infom']; ?></td>
                                <td><?php echo $row['room']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
