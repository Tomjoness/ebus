<form action="confirm_purchase.php" method="post">
  Please enter your customer name: <input type="text" name="custname" size="30" value=""><br>
  Please select from the following:
  <table border>
    <tr>
      <th>Product</th>
      <th>Price ($)</th>
      <th>Select</th>
    </tr>
    <?php
      // Connect to the database
      $db = new mysqli('localhost', 'username', 'password', 'database_name');
      if ($db->connect_errno) {
          die("Failed to connect to MySQL: " . $db->connect_error);
      }
      // Get the products from the database
      $query = "SELECT * FROM products";
      $result = $db->query($query);
      // Loop through the products and create a table row for each one
      while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row['description'] . '</td>';
          echo '<td>' . $row['price'] . '</td>';
          echo '<td><input type="checkbox" name="item[]" value="' . $row['id'] . '"></td>';
          echo '</tr>';
      }
      // Close the database connection
      $db->close();
    ?>
  </table>
  <input type="submit" name="button1" value="Order">
  <input type="reset" name="button2" value="Clear">
</form>