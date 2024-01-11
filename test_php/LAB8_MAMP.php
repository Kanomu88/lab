<?php
$name = "Kim";
$lastName = "Lumlerd";
$sername = "Kirakorn";
$major = "information technology";
$year = "3";
$room = "3/2";
$number = "13";
$imagePath = "1.webp";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เว็บไซต์แนะนำตัวเอง</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }
        .container {
            width: 50%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 50px;
        }
        img {
            border-radius: 50%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="<?php echo $imagePath; ?>" alt="">
        <h1><?php echo $name; ?></h1>
        <p>ชื่อจริง: <?php echo $sername; ?></p>
        <p>นามสกุล: <?php echo $lastName; ?></p>
        <p>สาขา: <?php echo $major; ?></p>
        <p>ชั้นปี: <?php echo $year; ?></p>
        <p>ห้อง: <?php echo $room; ?></p>
        <p>เลขที่: <?php echo $number; ?></p>
    </div>

</body>
</html>
