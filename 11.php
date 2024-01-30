<?php 
session_start(); 
$con = mysqli_connect("localhost", "root", "", "mydb2");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Insert data
if(isset($_POST['insert_data'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $major = mysqli_real_escape_string($con, $_POST['major']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $room = mysqli_real_escape_string($con, $_POST['room']);
    $number = mysqli_real_escape_string($con, $_POST['number']);

    $query = "INSERT INTO tbl_user2 (title, firstname, lastname, major, year, room, number) 
              VALUES ('$title', '$firstname', '$lastname', '$major', '$year', '$room', '$number')";
    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['status'] = "Data Inserted Successfully";
    } else {
        $_SESSION['status'] = "Data Not Inserted";
    }
}

// Fetch data
$query = "SELECT * FROM tbl_user1";
$result = mysqli_query($con, $query);
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Insert and Show Data</title>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <!-- Display status message -->
        <?php 
        if(isset($_SESSION['status'])) {
          ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Now!</strong> <?php echo $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
          unset($_SESSION['status']);
        }
        ?>

        <!-- Insert Data Form -->
        <div class="card mt-4">
          <div class="card-header">
            <h4>Insert Data into Database </h4>
          </div>
          <div class="card-body">
            <form action="main.php" method="POST">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" required placeholder="Enter title">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="">Firstname</label>
                    <input type="text" name="firstname" class="form-control" required placeholder="Enter your firstname">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="">Lastname</label>
                    <input type="text" name="lastname" class="form-control" required placeholder="Enter your lastname">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group mb-3">
                    <label for="">major</label>
                    <input type="text" name="major" class="form-control" required placeholder="Enter your major">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="">Year</label>
                    <input type="number" name="year" class="form-control" required placeholder="Enter your year">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="">Room</label>
                    <input type="number" name="room" class="form-control" required placeholder="Enter your room">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group mb-3">
                    <label for="">Number</label>
                    <input type="number" name="number" class="form-control" required placeholder="Enter your number">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group mb-3">
                    <button type="submit" name="insert_data" class="btn btn-primary">SAVE DATA</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Show Data Table -->
        <div class="card mt-4">
          <div class="card-header">
            <h4>Data Table</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>major</th>
                  <th>Year</th>
                  <th>Room</th>
                  <th>Number</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>{$row['title']}</td>";
                  echo "<td>{$row['firstname']}</td>";
                  echo "<td>{$row['lastname']}</td>";
                  echo "<td>{$row['major']}</td>";
                  echo "<td>{$row['year']}</td>";
                  echo "<td>{$row['room']}</td>";
                  echo "<td>{$row['number']}</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
