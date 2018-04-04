<?php
include "db.php";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$lat = mysqli_real_escape_string($conn, $_POST['lat']);
$lng = mysqli_real_escape_string($conn, $_POST['lng']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$text = mysqli_real_escape_string($conn, $_POST['text']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);

$sql = "INSERT INTO infos (`lat`, `lng`, `date`, `text`, `contact`)
VALUES ('$lat', '$lng', '$date' , '$text' , '$contact')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 
