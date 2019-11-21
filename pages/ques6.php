<!-- Page to list information of the head doctor of each hospital -->
<!DOCTYPE html>
<html>
      	<head>
            <title>Question 6</title>
            <link rel="stylesheet" type="text/css" href="../doctors.css">
            <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
        </head>

        <body>

        <?php
             	include "../php/connecttodb.php";
        ?>

	<h2>Head Information of Hospital</h2>

<form method="get" action="../main.php">
    <button type="submit">Back</button>
</form>

<!-- The table to show all the heads information -->
<hr class="new1">

        <table id="headtable">
                <caption>Head of Hospital</caption>
                <tr>
                <th>Hospital Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Start Date</th>
                </tr>
                <?php
                     	include "../php/gethead.php";
                ?>
        </table>

<hr class="new1">


</body>
</html>
