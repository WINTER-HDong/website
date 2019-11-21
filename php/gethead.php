<?php
    
    // get head information for each hospital 

    $query = "SELECT hospitalname, firstname, lastname, sincedate 
            FROM doctor INNER JOIN hospital ON hospital.headdocid = doctor.licensenumber ORDER BY hospitalname"; 

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("databases query on get head failed.");
    }

    // retrieve head information from query result
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["licensenumber"];

        echo "<tr value = $id>";
        echo "<td>" . $row["hospitalname"]. "</td>";
        echo "<td>" . $row["firstname"]. "</td>";
        echo "<td>" . $row["lastname"]. "</td>";
        echo "<td>" . $row["sincedate"]. "</td>";
        echo "</tr>";
    }

    mysqli_free_result($result);
    mysqli_close($connection);
?>
