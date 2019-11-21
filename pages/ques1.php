<!-- The page to sort and display doctor list -->
<!DOCTYPE html>
<html>
      	<head>
            <title>Question 1</title>
            <link rel="stylesheet" type="text/css" href="../doctors.css">
            <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
        </head>

        <body>
	<script type="text/javascript" src="../js/ques1.js"></script>

        <?php
                include "../php/connecttodb.php";
        ?>

        <h2>Sort and Display Doctors List</h2>
            
<!-- Create the button for back -->
<form method="get" action="../main.php">
    <button type="submit">Back</button>
</form>

<!-- Class for sorting options: 
    fn/ln, descending/ascending alphabetically -->
<hr class="new1">
<form id='tableform' action="" method="post">
  <p>Order by last name or by first name:</p>
    <!--create radio butter -->
  <input type="radio" name="name" value="firstname" required/> First Name
  <input type="radio" name="name" value="lastname" /> Last Name

  <p>Order in ascending or descending:</p>
  <input type="radio" name="order" value="DESC" required /> Descending
  <input type="radio" name="order" value="ASC" /> Ascending

  <button type="submit" name="sortsubmit">Sort</button>
</form>
            
<!-- Get doctor information form doctor table -->
<hr class="new2">

	<table id="doctable">
                <caption>Doctor Information</caption>
                <?php
                        include "../php/doctortable.php";
                ?>
        </table>

<hr class="new1">

<!-- Select a doctor from a drop-down list
    Show the selected doctor information
-->         
<h3>Select a Doctor and Display the Information</h3>
        <form id="selectdoc" action="" method="post">

                <select name="pickdocinfo" id='pickdocinfo'>
                        <option value="1">Select Here</option>
                        <?php
                                include "../php/pickdoctor.php";
                        ?>
                </select>
        </form>

<!-- check if the selection is submitted to the 'pickdocinfo' page -->    
        <hr class="new2">
        <?php
                if (isset($_POST['pickdocinfo'])) {
                        include "../php/connecttodb.php";
                        include "../php/getdocinfo.php";
                }

        ?>

	<hr class="new2">

<hr class="new1">


        </body>
</html>



