<?php

	// upload url into table 'doctor'

	// retrieve the post values for doctor license number and url
    $docid = $_POST['docid'];
    $docurl = $_POST['docurl'];
    
    // update table 'doctor' by setting the url value for a given doctor
    $query = "UPDATE doctor SET docimage = '$docurl' WHERE licensenumber = '$docid'";
    $result = mysqli_query($connection, $query);

    // display the result of updating operation
    if (!$result) {
        die("databases query on update url licensed date failed.");
    } else {
    	echo "<h4>" . "Successed: Doctor Image URL Uploaded !" . "</h4>";
    }
    mysqli_close($connection);
?>
