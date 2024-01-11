<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM tbl_user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "  Name: " . $row["firstname"]. " Last Name :" . $row["lastname"]. "<br>";

  }
} else {
  echo "999999 results";
}
$conn->close();
?>