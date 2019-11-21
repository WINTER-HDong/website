<?php
    
    // Add new treat relationship into table `treat`

    $docid = $_POST["docid"];
    $ohip = $_POST["assignpat"];

    $query = "INSERT INTO treat (ohip, licensenumber) VALUES ($ohip, '$docid')";
	$result = mysqli_query($connection, $query);

    if (!$result) {
        die("databases query on add treat failed. ");
    }

    echo "<p>Assign Treatment Successful! </p>"      
    mysqli_close($connection);  
?>
