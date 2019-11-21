<?php

	// delete doctor information from table `doctor`	

    $whichDoc = $_POST["invisubmit"];
    $query = "DELETE FROM doctor WHERE licensenumber ='$whichDoc'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
    	die("databases query on delete doctor failed. ");
    }

    mysqli_close($connection);
?>
