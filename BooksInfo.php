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
echo "<input type=\"radio\" name=\"button\" value=\"button1\" id=\"button1\"> To print whole table <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button2\" id=\"button2\" > Print all Books where “Twilight” is part of title of book <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button3\" id=\"button3\" > Print all the books with ISBNumber 100 <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button4\" id=\"button4\"> Print all the books belonging from department novel <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button5\" id=\"button5\" > Print all books whose title contain “the” <br>";
echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";

$selected= $_POST['button'];

 

// To print whole table 

 

if(isset($_POST['button'])) {

   if($selected == "button1"){

       echo"Printing whole table";

        $sql = "SELECT ISBNumber,Department,Availability FROM Books";
         $result = $conn->query($sql);

          if ($result->num_rows > 0) {
                  // output data of each row

                echo "<table border = \"1\">";

               echo "<tr> <th> ISBNumber </th> <th>  Department </th> <th> Availability  </th> </tr>";

                 while($row = $result->fetch_assoc()) {

                            echo "<tr> <td>". $row["ISBNumber"]. "</td> <td>  ". $row["Department"]. "</td> <td> " . $row["Availability"] . "</td></tr>";

                  }

                  echo "</table>";

           }

    }

 

// Print all Books where “Twilight” is part of title of book

if($selected == "button2"){

  echo "Printing Book title with Twilight";

  $sql = "SELECT ISBNumber,Title FROM `Books` where Title = 'Twilight'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> ISBNumber </th> <th> Title </th></tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["ISBNumber"]. "</td> <td>  ". $row["Title"]. "</td></tr>";

         }

         echo "</table>";

     }

}

 

 

// Print all the books with ISBNumber 100

if($selected == "button3"){

  echo "Print all the books with ISBNumber 100";

  $sql = "SELECT ISBNumber,Title FROM `Books` WHERE ISBNumber='100'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> ISBNumber </th> <th> Title </th></tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["ISBNumber"]. "</td> <td>  ". $row["Title"]. "</td></tr>";

         }

         echo "</table>";

     }

}

 

 

// Print all the books belonging from department novel

if($selected == "button4"){

  echo "Print all the books belonging from department novel";

  $sql = "SELECT Title, Department, Availability FROM `Books` WHERE Department='novel' AND Availability = 1";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> Title</th> <th> Department </th> <th> Availability </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["Title"]. "</td> <td>  ". $row["Department"]. "</td> <td>". $row["Availability"]. "</td>  </tr>";

         }

         echo "</table>";

     }

}

 

// Print all books whose title contain “the”

if($selected == "button5"){

  echo "Print all books whose title contain “the”";

  $sql = "SELECT Title,ISBNumber,Department FROM Books WHERE Title LIKE '%the%'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> ISBNumber</th> <th> Title </th> <th> Department </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["ISBNumber"]. "</td> <td>  ". $row["Title"]. "</td> <td>  ". $row["Department"]. "</td> </tr>";

         }

         echo "</table>";

     }

  }

}

$conn->close();

?>

{/source}
