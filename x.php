<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My E-Business Shop - List All Customers</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>List All Customers</h1>
  
  <?php
    // connect to the database
    $conn = mysqli_connect('localhost','root','','shop');
    // check connection
    if (!$conn) {
      die('Connection failed: ' . mysqli_connect_error());
    }
    // query the database
    $sql = "SELECT * FROM purchase";
    $result = mysqli_query($conn, $sql);
    // check if there are any records
    if (mysqli_num_rows($result) > 0) {
      // display records in a table
      echo "<table>";
      echo "<tr><th>ID</th><th>Name</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["pid"] . "</td><td>" . $row["vistor_name"] . "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "No customers found.";
    }
    // close the database connection
    mysqli_close($conn);
  ?>
  
</body>
</html>