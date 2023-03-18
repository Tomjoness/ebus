<?php
// Connect to database
$db = new mysqli('localhost', 'username', 'password', 'database_name');
if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_error);
}
// Loop through post variables
foreach ($_POST as $key => $value) {
    if ($key === 'custname') {
        // Check if customer exists in database
        $query = "SELECT id FROM customers WHERE name = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $value);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Customer already exists
            $row = $result->fetch_assoc();
            $customer_id = $row['id'];
        } else {
            // Customer does not exist, add to database
            $query = "INSERT INTO customers (name) VALUES (?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('s', $value);
            $stmt->execute();
            $customer_id = $stmt->insert_id;
        }
    } elseif ($key === 'item') {
        // Add item to purchases table
        $query = "INSERT INTO purchases (item, customer_id) VALUES (?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('si', $value, $customer_id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            // Success message
            echo '<p>Item added successfully!</p>';
        } else {
            // Error message
            echo '<p>Error: Unable to add item.</p>';
        }
    }
}
// Close database connection
$db->close();
?>