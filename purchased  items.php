<?php
// Connect to database
$db = new mysqli('localhost', 'username', 'password', 'database_name');
if ($db->connect_errno) {
   die("Failed to connect to MySQL: " . $db->connect_error);
}
// Initialize variables
$selected_items = array();
$total_price_ex_vat = 0;
$total_price_in_vat = 0;
// Validate form data
if (!empty($_POST['custname'])) {
    $custname = $_POST['custname'];
} else {
    die("Error: Customer name is required.");
}
if (!empty($_POST['item'])) {
    $selected_items = $_POST['item'];
} else {
    die("Error: At least one item must be selected.");
}
// Check if customer exists in database
$query = "SELECT id FROM customers WHERE name = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('s', $custname);
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
    $stmt->bind_param('s', $custname);
    $stmt->execute();
    $customer_id = $stmt->insert_id;
}
// Loop through selected items and calculate total prices
foreach ($selected_items as $item_id) {
    // Get item details from database
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Item found, calculate prices
        $row = $result->fetch_assoc();
        $item_price = $row['price'];
        $total_price_ex_vat += $item_price;
        $total_price_in_vat += $item_price * 1.2;
    }
}
// Round prices to nearest penny
$total_price_ex_vat = round($total_price_ex_vat, 2);
$total_price_in_vat = round($total_price_in_vat, 2);
// Display confirmation page
echo '<h2>Confirm Purchase</h2>';
echo '<p>Customer: ' . $custname . '</p>';
echo '<p>Selected Items:</p>';
echo '<ul>';
foreach ($selected_items as $item_id) {
    // Get item details from database
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows >)

	{ // Customer already exists
        1	$row = $result->fetch_assoc();
        2	$customer_id = $row['id'];
        3	} else {
        4	// Customer does not exist, add to database
        5	$query = "INSERT INTO customers (name) VALUES (?)";
        6	$stmt = $db->prepare($query);
        7	$stmt->bind_param('s', $value);
        8	$stmt->execute();
    if ($stmt->affected_rows > 0) {
        9	// Get the ID of the newly added customer
        10	$customer_id = $stmt->insert_id;
        11	} else {
        12	// Error adding customer
        13	die("Failed to add customer: " . $db->error);
        14	}
        15	}
        16	} elseif ($key === 'item') {
        17	// Add each selected item to purchases table
        18	foreach ($value as $item_id) {
        19	$query = "INSERT INTO purchases (item_id, customer_id) VALUES (?, ?)";
        20	$stmt = $db->prepare($query);
        21	$stmt->bind_param('ii', $item_id, $customer_id);
        22	$stmt->execute();
    if ($stmt->affected_rows <= 0) {
        23	// Error adding purchase
        24	die("Failed to add purchase: " . $db->error);
        25	}
        26	}
    // Get the purchased items and their prices
        27	$query = "SELECT description, price FROM products WHERE id IN (" . implode(",", $value) . ")";
        28	$result = $db->query($query);
    if ($result) {
        29	// Display purchased items and prices
        30	echo "<h2>Purchased Items:</h2>";
        31	echo "<ul>";
        32	$subtotal = 0;
        33	while ($row = $result->fetch_assoc()) {
        34	echo "<li>" . $row['description'] . " - $" . $row['price'] . "</li>";
        35	$subtotal += $row['price'];
        36	}
        37	echo "</ul>";
    // Calculate and display totals
        38	$tax_rate = 0.2;
        39	$tax = round($subtotal * $tax_rate, 2);
        40	$total = round($subtotal + $tax, 2);
        41	echo "<p>Subtotal: $" . $subtotal . "</p>";
        42	echo "<p>Tax: $" . $tax . "</p>";
        43	echo "<p>Total: $" . $total . "</p>";
    // Display purchase confirmation options
        44	echo '<p><a href="confirm_purchase.php?customer_id=' . $customer_id . '&subtotal=' . $subtotal . '&tax=' . $tax . '&total=' . $total . '">Proceed with purchase</a></p>';
        45	echo '<p><a href="index.php">Return to home page</a></p>';
        46	echo '<p><a href="purchases.php">Return to purchases page</a></p>';
        47	} else {
        48	// Error retrieving purchased items
        49	die("Failed to retrieve purchased items: " . $db->error);
        50	}
        51	}
        52	}
    // Close database connection
    $db->close();
    ?>