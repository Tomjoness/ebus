<!DOCTYPE html>
<html>
<head>
	<title>Purchased Page</title>
	<style>
		img {
			max-width: 200px;
			max-height: 200px;
		}
	</style>
</head>
<body>
	<form action="confirmation.php" method="post">
		<h2>Purchase Summary:</h2>
		<!-- List of selected items -->
		<?php
		// Retrieve the selected items from the previous form
		if (isset($_POST['items'])) {
			$selected_items = $_POST['items'];
			if (count($selected_items) > 0) {
				echo "<ul>";
				$total_excl_vat = 0;
				foreach ($selected_items as $price) {
					echo "<li>Item - £$price</li>";
					$total_excl_vat += $price;
				}
				echo "</ul>";
			} else {
				echo "No items selected.";
			}
		} else {
			echo "No items selected.";
		}
		?>
		<!-- Total price including and excluding VAT -->
		<?php
		$vat_rate = 0.2; // VAT rate is 20%
		$vat_amount = $total_excl_vat * $vat_rate;
		$total_incl_vat = $total_excl_vat + $vat_amount;
		echo "<p>Total excluding VAT: £" . number_format($total_excl_vat, 2) . "</p>";
		echo "<p>Total including VAT: £" . number_format($total_incl_vat, 2) . "</p>";
		?>
		<!-- Images and links -->
		<img src="item1.jpg" alt="Item 1">
		<img src="item4.jpg" alt="Item 4">
		<p>Links:</p>
		<ul>
			<li><a href="purchases.php">Back to Purchases Page</a></li>
			<li><a href="home.php">Home Page</a></li>
		</ul>
		<!-- Proceed with purchase button -->
		<input type="submit" value="Proceed with Purchase">
	</form>
</body>
</html>