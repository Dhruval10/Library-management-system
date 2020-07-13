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
echo "<input type=\"radio\" name=\"button\" value=\"button1\" id=\"button1\"> Print all of the publicationID By Year <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button2\" id=\"button2\" > Print publicationID with 1000 with year <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button3\" id=\"button3\" > Print all the publications with year <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button4\" id=\"button4\"> Print all publications with year 2000 with language <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button5\" id=\"button5\" > Print all books with language spanish <br>";


echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";

$selected= $_POST['button'];

 

// Print all of the publicationID By Year

 

if(isset($_POST['button'])) {

   if($selected == "button1"){

       echo"Printing all of the publicationID By Year <br>";

        $sql = "SELECT publicationID,Year FROM `Publication`";
         $result = $conn->query($sql);

          if ($result->num_rows > 0) {
                  // output data of each row

                echo "<table border = \"1\">";

               echo "<tr> <th> PubllicationID</th> <th> Year</th> </tr>";

                 while($row = $result->fetch_assoc()) {

                            echo "<tr> <td>". $row["publicationID"]. "</td> <td>". $row["Year"]. "</td> </tr>";

                  }

                  echo "</table>";

           }

    }

 

// Print publicationID with 1000 with year

if($selected == "button2"){

  echo "Print publicationID with 1000 with year";

  $sql = "SELECT publicationID,Year FROM `Publication` where publicationID = '1000'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> PublicationID </th> <th> Year </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["publicationID"]. "</td> <td>". $row["Year"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

 

// Print all the publications with year

if($selected == "button3"){

  echo "Print all the publications with year";

  $sql = "SELECT publicationID,Year FROM `Publication` WHERE 1";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> PublicationID</th> <th> Year </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["publicationID"]. "</td> <td>". $row["Year"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

 

// Print all publications with year 2000 with language

if($selected == "button4"){

  echo "Print all publications with year 2000 with language <br>";

  $sql = "SELECT Year,Language FROM `Publication` where Year=2000";


   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> Year</th> <th> Language </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["Year"]. "</td> <td>". $row["Language"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

//Print all books with language spanish

if($selected == "button5"){

  echo "Print all books with language spanish";

  $sql = "SELECT publicationID,Language FROM `Publication` where Language = 'Spanish'";

   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> PublicationID</th> <th> Language </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["publicationID"]. "</td> <td>". $row["Language"]. "</td> </tr>";

         }

         echo "</table>";

     }

  }

  

}

$conn->close();

?>

{/source}