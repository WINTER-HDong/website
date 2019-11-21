<?php
    
    // get doctor's information with workin hospital name based on given license number


    $whichDoc = $_POST["pickdocinfo"]; 
    $query = "SELECT * FROM doctor INNER JOIN hospital ON doctor.worksinhoscode = hospital.hospitalcode WHERE licensenumber = '$whichDoc'"; 
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die("databases query on get doc info failed. ");
    }

    echo "<ul>"; 

    // put the doctor information in an unordered bulleted list
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . "License Number: " . $row["licensenumber"] . "</li>";
        echo "<li>" . "First Name: " . $row["firstname"] . "</li>";
        echo "<li>" . "Last Name: " . $row["lastname"] . "</li>";
        echo "<li>" . "Specialty: " . $row["specialty"] . "</li>";
        echo "<li>" . "Date: " . $row["date"] . "</li>";
        echo "<li>" . "Hospital: " . $row["hospitalname"] . "</li>";
    }

    echo "</ul>";  
    mysqli_free_result($result);
    mysqli_close($connection);
?>
