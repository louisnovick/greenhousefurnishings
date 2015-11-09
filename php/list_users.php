<?php
    //require("db_connect.php");
	if ($result = $mysqli->query("select * from users order by lName")) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='admin-row'>";
        echo "<td>" . $row["lName"] . "</td>";
        echo "<td>" . $row["fName"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["userAccess"] . "</td>";
        if ($_SESSION["logged_in_user_access"] == "administrative") echo "<td class='edit-icon'><button id='edit-user-btn' type='button' class='btn btn-default get' data-toggle='modal' data-target='#edit-user' value='" . $row["username"] . "' onclick='UserInfoCallback(this.value)'>Edit</button></td>";
        echo "</tr>";
	}
 	/* free result set */
	 $result->free();
	}
?>