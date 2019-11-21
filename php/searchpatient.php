<?php
     
	// get all doctors' information who treat a given patient

	// retrieve patient ohip from form posting
    $whichohip = $_POST["ohip"];
    
    $query = "
    		SELECT patient.firstname AS pfn,
				patient.lastname AS pln,
				doctor.firstname AS dfn,
				doctor.lastname AS dln
		 	FROM patient
                INNER JOIN treat ON patient.ohip = treat.ohip
                INNER JOIN doctor ON treat.licensenumber = doctor.licensenumber
            WHERE patient.ohip = '$whichohip'";

    $result = mysqli_query($connection, $query);

    // if the reuslt is null, the input ohip does not exist
    if (mysqli_num_rows($result) == 0 ){
        echo "<p>Patient OHIP Number " .$whichohip. " Does Not Exist</p>";
    } else {

    	// display the doctor and patient information into a table
	    while ($row = mysqli_fetch_assoc($result)) {
	        echo "<tr>";
	        echo "<td>" . $row["pfn"]. "</td>";
	        echo "<td>" . $row["pln"]. "</td>";
	        echo "<td>" . $row["dfn"]. "</td>";
	        echo "<td>" . $row["dln"]. "</td>";
	        echo "</tr>";
	    }
	}

    mysqli_free_result($result);
	mysqli_close($connection);
?>
