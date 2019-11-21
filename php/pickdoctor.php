<?php

    // select all doctors' information and display that in a 'select' form

    // select all information from table 'doctor'
    $query = "SELECT * FROM doctor ORDER BY firstname DESC";
    $result = mysqli_query($connection,$query); 

    if (!$result) {
        die("databases query on pick doctor failed.");
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["licensenumber"];
        // each doctor is a option in the form
        echo "<option value = $id>".$row["firstname"]." ".$row["lastname"]."</option>";
    }

    mysqli_free_result($result);
    mysqli_close($connection);
?>
