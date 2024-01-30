<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    คำนำหน้า: <input type="text" name="title" required><br>
    ชื่อ: <input type="text" name="firstname" required><br>
    นามสกุล: <input type="text" name="lastname" required><br>
    สาขา: <input type="text" name="major" required><br>
    ชั้นปี: <input type="number" name="year" required><br>
    ห้อง: <input type="number" name="room" required><br>
    เลขที่: <input type="number" name="number" required><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb2";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);
// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// ตรวจสอบการส่งข้อมูลจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $major = $_POST['major'];
    $year = $_POST['year'];
    $room = $_POST['room'];
    $number = $_POST['number'];

    // เพิ่มข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO tbl_user1 (title, firstname, lastname, major, year, room, number)
            VALUES ('$title', '$firstname', '$lastname', '$major', $year, '$room', $number	)";

    if ($conn->query($sql) === TRUE) {
        echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$sql = "SELECT * FROM tbl_user1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>คำนำหน้า</th><th>ชื่อ</th><th>นามสกุล</th><th>สาขา</th><th>ชั้นปี</th><th>ห้อง</th><th>เลขที่</th></tr>";
    // แสดงข้อมูลที่ดึงมาจากฐานข้อมูล
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["title"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["major"]. "</td><td>" . $row["year"]. "</td><td>" . $row["room"]. "</td><td>" . $row["number"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
// ปิดการเชื่อมต่อ
$conn->close();
?>