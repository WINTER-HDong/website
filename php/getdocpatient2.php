<?php

    // get doctor and patient information 

    $whichDoc = $_POST["stopdoc"];

    // get doctor's information based on given license number
    $query0 = "SELECT * FROM doctor WHERE licensenumber = '$whichDoc'";
    $result0 = mysqli_query($connection, $query0);
    $row = mysqli_fetch_assoc($result0);
    
    echo "<h5> Doctor: ".$row['firstname']." ".$row['lastname']."</h5>";

    mysqli_free_result($result0);

    // select all patients which are not treated by the given doctor
    $query = "SELECT DISTINCT * FROM patient WHERE ohip IN (
                SELECT ohip FROM treat WHERE treat.licensenumber = '$whichDoc')";

    $result = mysqli_query($connection, $query);

    // create a form for user to select a new patient for doctor
    echo "<form id='showpat2' action='' method='post'>";
    echo "<p>Select Patient</p>";

    echo "<select name='stoppat' id='stoppat'>";
    
    // each patient information is stored as a option 
    while ($row = mysqli_fetch_assoc($result)) {
		echo "<option value='$row[ohip]'>" . $row["firstname"] . " " . $row["lastname"] . " (" .$row["ohip"]. ")</option>";
    }

    echo "</select>";

    // a hidden input for posting doctor's license number
    echo "<input type='hidden' name='docid2' value='$whichDoc'></input>";
    echo "<br><button type='submit' name='stopsubmit'>Stop</button>";
    echo "</form>";
    mysqli_close($connection);
?>
