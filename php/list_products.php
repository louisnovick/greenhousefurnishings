<?php
    //require("db_connect.php");
	if ($result = $mysqli->query("select * from products order by sku asc")) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='admin-row'>";
        echo "<td>" . $row["sku"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . ucfirst($row["type"]) . "</td>";
        echo "<td class='row_desc'><div class='div-desc'>" . $row["description"] . "</div></td>";
        echo "<td>" . $row["collection"] . "</td>";
        echo "<td><img src='" . $row["image_tn"] . "' alt='No Image' /></td>";
        echo "<td class='money'>$" . $row["cost"] . "</td>";
        echo "<td class='money'>$" . $row["price"] . "</td>";
        echo "<td>" . $row["stock"] . "</td>";
        echo "<td class='edit-icon'><button type='button' class='btn btn-default get' data-toggle='modal' data-target='#edit-product' value='" . $row["productID"] . "' onclick='ProductInfoCallback(this.value)'>Edit</button></td>";
        echo "</tr>";
	}
 	/* free result set */
	 $result->free();
	}
?>