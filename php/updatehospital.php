<?php
	
	// change hospital name

	// retrieve the posting values for hospital code and new hospital name
    $hospitalcode = $_POST['selehos'];
    $newname = $_POST['hosname'];

    // update the table 'hospital' by changing the hospital name
    $query = "UPDATE hospital SET hospitalname = '$newname' WHERE hospitalcode = '$hospitalcode'";
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die("databases query on update hospital failed.");
    }

    header("Refresh:0");
    mysqli_close($connection);
?>

