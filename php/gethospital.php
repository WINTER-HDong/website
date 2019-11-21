<?php

    // get hospital information from table 'hospital'

    
    $query = "SELECT * FROM hospital";
    
    $result = mysqli_query($connection,$query);
    
    // report error if query failed
    if (!$result) {
        die("databases query on get hospital failed.");
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["hospitalcode"];
        // print hospital with hospital name, city and province
        echo "<option value = $id>".$row["hospitalname"]. " (".$row["city"]." ,".$row["province"].")</option>";
    }

    mysqli_free_result($result);
    mysqli_close($connection);
?>
