{source} 

<?php

$servername = "localhost";
$username = "group2";
$password = "group2";

$dbname = "group2";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

 

echo "<form method = \"POST\" action=\"\">";
echo "<input type=\"radio\" name=\"button\" value=\"button1\" id=\"button1\"> Print all of the authors <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button2\" id=\"button2\" > Print all authors where “Nancy” is part of the name of the author <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button3\" id=\"button3\" > Print all authors with a specific designation is “Professor” or “Employee” <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button4\" id=\"button4\"> Print all authors with Qualification is “PhD” and “Designation is “Professor” <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button5\" id=\"button5\" > Print all authors with Qualification is “masters” and “Designation is “Professor” <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button6\" id=\"button6\" > Print all authors whose email contain “.edu” <br>";


echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";

$selected= $_POST['button'];

 

// Print all of the authors

 

if(isset($_POST['button'])) {

   if($selected == "button1"){

       echo"Printing whole table";

        $sql = "SELECT Name FROM `Author`";
         $result = $conn->query($sql);

          if ($result->num_rows > 0) {
                  // output data of each row

                echo "<table border = \"1\">";

               echo "<tr> <th> Name </th> </tr>";

                 while($row = $result->fetch_assoc()) {

                            echo "<tr> <td>". $row["Name"]. "</td> </tr>";

                  }

                  echo "</table>";

           }

    }

 

// Print all authors where “Nancy” is part of the name of the author

if($selected == "button2"){

  echo "Print all authors where “Nancy” is part of the name of the author";

  $sql = "SELECT * FROM `Author` where Name = 'jay'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> AuthorID</th> <th> Name </th> <th> Qualification </th> <th> Designation </th> <th> Email </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["AuthorID"]. "</td> <td>". $row["Name"]. "</td> <td>". $row["Qualification"]. "</td> <td>". $row["Designation"]. "</td> <td>". $row["Email"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

 

// Print all authors with a specific designation is “Professor” or “Employee”

if($selected == "button3"){

  echo "Print all authors with a specific designation is “Professor” or “Employee”";

  $sql = "SELECT * FROM `Author` where Designation = 'Professor'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> AuthorID</th> <th> Name </th> <th> Qualification </th> <th> Designation </th> <th> Email </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["AuthorID"]. "</td> <td>". $row["Name"]. "</td> <td>". $row["Qualification"]. "</td> <td>". $row["Designation"]. "</td> <td>". $row["Email"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

 

// Print all authors with Qualification is “PhD” and “Designation is “Professor”

if($selected == "button4"){

  echo "Print all authors with Qualification is “PhD” and “Designation is “Professor” <br>";

  $sql = "SELECT * FROM `Author` where Qualification = 'PH. D' AND Designation = 'Professor'";


   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> AuthorID</th> <th> Name </th> <th> Qualification </th> <th> Designation </th> <th> Email </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["AuthorID"]. "</td> <td>". $row["Name"]. "</td> <td>". $row["Qualification"]. "</td> <td>". $row["Designation"]. "</td> <td>". $row["Email"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

// Print all authors with Qualification is “masters” and “Designation is “Professor”

if($selected == "button5"){

  echo "Print all authors with Qualification is “masters” and “Designation is “Professor”";

  $sql = "SELECT * FROM `Author` where Qualification = 'masters' AND Designation = 'Professor'";

   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> AuthorID</th> <th> Name </th> <th> Qualification </th> <th> Designation </th> <th> Email </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["AuthorID"]. "</td> <td>". $row["Name"]. "</td> <td>". $row["Qualification"]. "</td> <td>". $row["Designation"]. "</td> <td>". $row["Email"]. "</td> </tr>";

         }

         echo "</table>";

     }

  }

 

// Print all authors whose email contain “.edu”

if($selected == "button6"){

  echo "Print all authors whose email contain “.edu”";

  $sql = "SELECT * FROM Author WHERE Email LIKE '%.edu%'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> AuthorID</th> <th> Name </th> <th> Qualification </th> <th> Designation </th> <th> Email </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["AuthorID"]. "</td> <td>". $row["Name"]. "</td> <td>". $row["Qualification"]. "</td> <td>". $row["Designation"]. "</td> <td>". $row["Email"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

}

$conn->close();

?>

{/source}
