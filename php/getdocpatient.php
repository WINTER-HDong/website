<?php

    // select all patients treated by a given doctor

    $whichDoc = $_POST["assigndoc"];

    // get doctor's information based on given license number
	$query0 = "SELECT * FROM doctor WHERE licensenumber = '$whichDoc'";
	$result0 = mysqli_query($connection, $query0);
	$row = mysqli_fetch_assoc($result0);

	// display doctor's firstname and lastname
	echo "<h5> Doctor: ".$row['firstname']." ".$row['lastname']."</h5>";
	
	mysqli_free_result($result0);

	// select all patients treated by a given doctor
    $query = "SELECT DISTINCT * FROM patient WHERE ohip NOT IN (
		SELECT ohip FROM treat WHERE treat.licensenumber = '$whichDoc')";

    $result = mysqli_query($connection, $query);

    // create a form showing patient options
	echo "<form id='showpat' action='' method='post'>";
	echo "<p>Select Patient</p>";
	echo "<select name='assignpat' id='assignpat'>";
	        
	// each patient is a option        
	while ($row = mysqli_fetch_assoc($result)) {
	    echo "<option value='$row[ohip]'>" . $row["firstname"] . " " . $row["lastname"] . " (" .$row["ohip"]. ")</option>";
	}

	echo "</select>";

	// a hidden input for sending doctor license
	echo "<input type='hidden' name='docid' value='$whichDoc'></input>";
	echo "<br><button type='submit' name='addsubmit'>Assign</button>";
	echo "</form>";
	mysqli_close($connection);
?>
