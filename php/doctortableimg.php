<?php
    
    // create table showing all doctors' information with image

    $query = "SELECT * FROM doctor ORDER BY firstname ASC";

    $result = mysqli_query($connection,$query);

    if (!$result) {
           die("databases query on doctor table image failed.");
    }

    // create the table header
    echo "<tr>";
    echo "<th>FirstName</th>";
    echo "<th>LastName</th>";
    echo "<th>License</th>";
    echo "<th>Specialty</th>";
    echo "<th>License Date</th>";
    echo "<th>Image</th>";
    echo "</tr>";

    // fetch the information from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["licensenumber"];
		$url = $row['docimage'];		

        // allow user to add new url for the doctor if current url is null
        if (is_null($url)) {
            echo "<tr value = '$id' onClick='document.location.href=" .
			     '"../pages/ques10_upload.php?license='.$id."&fname=".$row["firstname"]."&lname=".$row["lastname"].'"'."'>";
        } else {
            // add click event, if url is not empty, link to the url page when clicking
            echo "<tr onclick='window.location.href=".'"'.$url.'"'."'>";
        }

        // display each doctor's information
        echo "<td>" . $row["firstname"]. "</td>";
        echo "<td>" . $row["lastname"]. "</td>";
        echo "<td>" . $row["licensenumber"]. "</td>";
        echo "<td>" . $row["specialty"]. "</td>";
        echo "<td>" . $row["date"]. "</td>";
      
        if (is_null($url)) {
            echo "<td style='color:red;'>Upload</td>";
        } else {
            // display the image of current doctor
            echo "<td><img height='50'style='display:block;' src='$url'></td>";
        }
        echo "</tr>";
    }

    mysqli_free_result($result);
    mysqli_close($connection);
?>

