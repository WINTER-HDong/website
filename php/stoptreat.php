<?php
    
    // delete a treatment record from the table 'treat'

	// retrieve the information 
    $docid = $_POST["docid2"];
    $ohip = $_POST["stoppat"];

    // delete a treat record based on the given ohip and doctor license number
    $query = "DELETE FROM treat WHERE ohip = $ohip AND licensenumber = '$docid'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("databases query on stop treat failed. ");
    }

	echo "<p>Delete Treatment Successful! </p>"
    mysqli_close($connection);
?>



