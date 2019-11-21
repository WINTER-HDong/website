<?php
	
	// display the table showing all doctors' information

	// set default value to variable 
	$name = "firstname";
	$order = "DESC";

	// if the submit button is clicked 
	if (isset($_POST['sortsubmit'])) {
		// if both of the options are checked
		if (isset($_POST['name']) & isset($_POST['order']))   
  			$name = $_POST['name'];  
			$order = $_POST["order"];
	}
	
	// select doctor information with given order
	$query = "SELECT * FROM doctor ORDER BY $name $order";

	// connect the database
	$result = mysqli_query($connection,$query); 

	if (!$result) {
    	die("databases query on get doc failed.");
  	}

	$var1 = "Firstname (DESC)";
	$var2 = "Firstname (ASC)";
	$var3 = "Lastname (DESC)";
	$var4 = "Lastname (ASC)";

	echo "<tr>";

	// ordered by doctor firstname
	if ($name == "firstname") {
		// ordered by descending
		if ($order == "DESC"){
			echo "<th>".$var1."</th>";
		} else {
			echo "<th>".$var2."</th>";
		}
		echo "<th>Lastname</th>";
	// ordered by doctor lastname	
	} else {
		echo "<th>Firstname</th>";
		// ordered by descending
        if ($order == "DESC"){ 
            echo "<th>".$var3."</th>";
        } else { 
        	echo "<th>".$var4."</th>";
        }
	}

    echo "</tr>";

    // fetch the doctor information and display into table
    while ($row = mysqli_fetch_assoc($result)) {
    	$id = $row["licensenumber"];

        echo "<tr value = $id>";
        echo "<td>" . $row["firstname"]. "</td>";
        echo "<td>" . $row["lastname"]. "</td>";
        echo "</tr>";
    }

	mysqli_free_result($result);
	mysqli_close($connection);
?>


