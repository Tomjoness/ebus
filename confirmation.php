<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_value_pairs = array();
    foreach ($_POST as $name => $value) {
        if ($value == "ON") {
            $name_value_pairs[$name] = 1;
        } else {
            $name_value_pairs[$name] = 0;
        }
    }
    // Store data in the database
    $sql = "INSERT INTO purchase (pid, vistor_name)
            VALUES ('".$name_value_pairs["pid"]."', '".$name_value_pairs["vistor_name"]."')";
    if ($conn->query($sql) === TRUE) {
        echo "Data stored successfully";
    } else {
        echo "Error storing data: " . $conn->error;
    }
}
// Close the database connection
$conn->close();
?>