<?php

    // add a new doctor information

    // if sumbit button for insertion operation is clicked
    if (isset($_POST['insertsubmit'])) {

        // retrieve the information based on the form posting
        $firstname = $_POST['infirstname']; # doctor firstname
        $lastname = $_POST['inlastname']; # doctor lastname
        $license = $_POST['inlnumber']; # doctor license number
        $specialty = $_POST['inspecialty']; # doctor specialty 
        $hospital = $_POST['gethospital']; # hopstial name
        $date = $_POST['indate']; # license number since date

        // get a doctor's information based on the given license number
        $query1 = "SELECT * FROM doctor WHERE licensenumber='$license'";

        $result1 = mysqli_query($connection,$query1);

        if (!$result1) {
            die("databases query on insert doctor failed.");
        }

        $num_rows = mysqli_num_rows($result1);
        
        // doctor license number already existed
        if ($num_rows != 0){
            echo "<h5>" . "Failed: license number " .$license." already existed !" . "</h5>";
		    mysqli_free_result($result1);
        } else {
            // insert a new doctor information into the table 'doctor'
            $query2 = "INSERT INTO doctor (licensenumber, firstname, lastname, specialty, date, worksinhoscode) 
                    VALUES ('$license', '$firstname', '$lastname', '$specialty', '$date', '$hospital')";

         	$result2 = mysqli_query($connection,$query2);
        	
            if (!$result2) {
           	    die("databases query on insert doctor failed.");
        	}

            // insertion operation succeed
        	echo "<h4>" . "Successed: Doctor Information Inserted !" . "</h4>";
        }
    }
    mysqli_close($connection);
?>
