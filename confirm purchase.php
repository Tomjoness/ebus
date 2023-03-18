<!DOCTYPE html>
<html>
<head>
  <title>Confirm Purchase</title>
</head>
<body>
  <h1>Confirm Your Purchase</h1>
  <?php
    // Check if the user submitted the form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Get the customer name from the form
      $custname = $_POST['custname'];
      // Check if any products were selected
      if (!empty($_POST['item'])) {
        // Connect to the database
        $db = new mysqli('localhost', 'username', 'password', 'database_name');
        if ($db->connect_errno) {
          die("Failed to connect to MySQL: " . $db->connect_error);
        }
        // Loop through the selected products and add them to the order
        $total_price = 0;
        $order_items = array();
        foreach ($_POST['item'] as $product_id) {
          $query = "SELECT * FROM products WHERE id = $product_id";
          $result = $db->query($query);
          $row = $result->fetch_assoc();
          $total_price += $row['price'];
          $order_items[] = $row['description'];
        }
        // Close the database connection
        $db->close();
        // Display the order summary to the user
        echo '<p>Thank you for your purchase, ' . $custname . '!</p>';
        echo '<p>You have ordered the following items:</p>';
        echo '<ul>';
        foreach ($order_items as $item) {
          echo '<li>' . $item . '</li>';
        }
        echo '</ul>';
        echo '<p>Total price: $' . $total_price . '</p>';
        echo '<form action="process_purchase.php" method="post">';
        echo '<input type="hidden" name="custname" value="' . $custname . '">';
        foreach ($_POST['item'] as $product_id) {
          echo '<input type="hidden" name="item[]" value="' . $product_id . '">';
        }
        echo '<input type="submit" name="button1" value="Confirm Purchase">';
        echo '</form>';
      } else {
        // No products were selected
        echo '<p>You did not select any products. Please go back and make a selection.</p>';
      }
    } else {
      // The user did not submit the form
      echo '<p>You did not submit the form. Please go back and make a selection.</p>';
    }
  ?>
</body>
</html> 