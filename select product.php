<html> 
  <head>
   <title>Video Form Read</title> 
  </head>
<body>
<p>You chose: </p>
<?php
  $total=0;
  if (isset($_POST["film_1"]))
    {$film_1 = $_POST["film_1"];
$film_1_value = $_POST["film_1_value"];
echo("<p>Film 1, price: &pound; $film_1_value  </p>");
     $total=$total+$film_1_value;
  }
  if (isset($_POST["film_2"]))
    {$film_2 = $_POST["film_2"];
$film_2_value = $_POST["film_2_value"];
echo("<p>Film 2, price: &pound; $film_2_value  </p>");
     $total=$total+$film_2_value;
  }
  if (isset($_POST["film_3"]))
    {$film_3 = $_POST["film_3"];
$film_3_value = $_POST["film_3_value"];
echo("<p>Film 3, price: &pound; $film_3_value  </p>");
     $total=$total+$film_3_value;
  }
echo("<p>Total cost = &pound; $total  </p>");?>
</body> </html>