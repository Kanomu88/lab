<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, major, number, room FROM tbl_user1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "  Name: " . $row["firstname"]. " Last Name :" . $row["lastname"]. " major: " . $row["major"]. " number : " . $row["number"]. " room  :" . $row["room"]. "<br>";

  }
} else {
  echo "0 results";
}
$conn->close();
?>