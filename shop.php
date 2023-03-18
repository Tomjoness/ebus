<?php
function returnTable ($con, $sql, $format, $img=false) {
    
    $con->query('SET NAMES utf8');
    $result = $con->query($sql);
    
    $table =  '<table>';
    $table .= '<tr>';
    foreach($format as $key=>$val) {
        $table .= "<th>$val</th>";
    }
	
	$table .= '</tr>';
	while ($row = $result->fetch_object()) {
        $table .= '<tr>';
        foreach ($format as $key=>$val) {
            $table .= '<td>' . $row->$key . '</td>';
        }
        $table .= '</tr>';
    }
    
    if ($img != false) {
        
        $pattern = '/([\w\-]+\.png)/i';
        $replacement = '<img src="./images/${1}" width="' . $img . '" />';
        $table = preg_replace($pattern, $replacement, $table);
    }

    $table .= '</table>';
    
    return $table;
}

# Function test
$con = new mysqli('localhost','root','','shop');
$sql = 'SELECT * FROM product';
$format = ['productID'=>'id', 'prodName'=>'item', 'prodDesc'=>'description', 'prodPrice'=>'price (£)', 'prodImage'=>'image'];

echo returnTable($con, $sql, $format, '150');
?>