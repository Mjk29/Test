<?php

// var_dump($_POST)


$servername = "sql.njit.edu";
$username = "mjk29";
$password = "KP2wtAdHk";
$dbname = "mjk29";

// echo phpinfo();

$link = new mysqli($servername, $username, $password, $dbname);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}



// $sql = "INSERT INTO Inventory (SKU, Keywords, Description, Consumable, Availability, Price, Link, Name, Image, Location)
//         VALUES ('".rand()."',2,3,4,5,6,7,8,9,0  )";

if ($_POST["POSTTYPE"] == 'item') {
	echo "ADDING ITEM FROM PHP\n";
	$sql = "INSERT INTO Inventory (SKU, Keywords, Description, Consumable, Availability, Price, Link, Name, Image, Location)
	        VALUES ('".$_POST["SKU"]."','".$_POST["Keywords"]."','".$_POST["Description"]."','".$_POST["Consumable"]."',
	        '".$_POST["Availability"]."','".$_POST["Price"]."','".$_POST["Link"]."','".$_POST["Name"]."',
	        '".$_POST["Image"]."','".$_POST["Location"]."'
	    )";
}

else if ($_POST["POSTTYPE"] == 'user') {
echo "ADDING ITEM FROM PHP\n";
	$sql = "INSERT INTO user (UCID, Name, Address)
	        VALUES ('".$_POST["UCID"]."','".$_POST["Name"]."','".$_POST["Address"]."')";

}


else if ($_POST["POSTTYPE"] == 'tx') {
	echo "ADDING TX FROM PHP\n";
	$sql = "INSERT INTO transactions (transactionID, UCID, Name, Total, Item)
	        VALUES ('".$_POST["transactionID"]."','".$_POST["UCID"]."','".$_POST["Name"]."','".$_POST["Total"]."','".$_POST["Item"]."')";
}


else if ($_POST["POSTTYPE"] == 'get') {
	echo "GETTING TABLE DATA : ".$_POST["tableName"]."\n\n";	
	

	if ($result = $link->multi_query("SELECT * FROM ".$_POST["tableName"]."")) {
	  do {
        /* store first result set */
        if ($result = $link->use_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s  %s  ||  %s  ||  %s\n", $row[0], $row[1], $row[7], $row[5]);
            }
            $result->close();
        }
        /* print divider */
        if ($link->more_results()) {
            printf("-----------------\n");
        }
    } while ($link->next_result());
}




	// // $sql = "SELECT '*' FROM '".$_POST["tableName"]."'";
	// // $sql = "SELECT * FROM 'user'";
	// $sql = "SELECT * FROM `Inventory`";
	// $sql = "SELECT * FROM `Inventory`";
	// echo(mysql_error());

	// echo $result;
	// $result = $link->query($sql);

		// $sql = "SELECT * FROM persons";
		// if($result = mysqli_query($link, $sql)){
	 //    if(mysqli_num_rows($result) > 0){
	 //        echo "<table>";
	 //            echo "<tr>";
	 //                echo "<th>id</th>";
	 //                echo "<th>first_name</th>";
	 //                echo "<th>last_name</th>";
	 //                echo "<th>email</th>";
	 //            echo "</tr>";
	 //        while($row = mysqli_fetch_array($result)){
	 //            echo "<tr>";
	 //                echo "<td>" . $row['id'] . "</td>";
	 //                echo "<td>" . $row['first_name'] . "</td>";
	 //                echo "<td>" . $row['last_name'] . "</td>";
	 //                echo "<td>" . $row['email'] . "</td>";
	 //            echo "</tr>";
	 //        }
	 //        echo "</table>";
	 //        // Free result set
	 //        mysqli_free_result($result);
}



        // VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["email"]."')";



// $sql = "INSERT INTO inventory (Category,Item,Description,Consumable,Quantity,Unit Price,Link)
// VALUES ('$_POST'['Category'], '69.69', '42', 'some garbage')";

// "Category": "Tools",
//    "Item": "keyboard/mouse",
//    "Description": "",
//    "Consumable": "no",
//    "Quantity": 2,
//    "Unit Price": 14.99,
//    "Link":





var_dump($sql);

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();


?>