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

$sql = "SELECT id, firstname, lastname, infom, number1, room FROM tbl_user2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "  Name: " . $row["firstname"]. " Last Name :" . $row["lastname"]. " infom: " . $row["infom"]. " number : " . $row["number1"]. " room  :" . $row["room"]. "<br>";

  }
} else {
  echo "0 results";
}
$conn->close();
?>