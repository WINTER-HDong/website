<?php

    // get doctor's license number  
    
    // if the submit button is clicked
    if (isset($_POST['datesubmit'])) {
        // if the date of license is typed
        if (isset($_POST['licenseday'])) { 
            $date = $_POST['licenseday'];    

            $query = "SELECT * FROM doctor WHERE date < '$date'";
   	        $result = mysqli_query($connection,$query);
    	   
            if (!$result) {
        	   die("databases query on get doc licensed date failed.");
    	    }

            // retrieve the data from query result
    	    while ($row = mysqli_fetch_assoc($result)) {
            	$id = $row["licensenumber"];

                // display the row for a doctor
            	echo "<tr value = $id>";
            	echo "<td>" . $row["firstname"]. "</td>";
            	echo "<td>" . $row["lastname"]. "</td>";
            	echo "<td>" . $row["specialty"]. "</td>";
            	echo "<td>" . $row["date"]. "</td>";
            	echo "</tr>";
    	    }
    	    mysqli_free_result($result);
	    }
    }
    mysqli_close($connection);
?>

