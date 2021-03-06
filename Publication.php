{source}

<?php

 

$db = JFactory::getDbo();

$query = $db->getQuery(true);

$query->select('*');

$query->from('Publication');

$db->setQuery($query);

$results = $db->loadAssocList();

 

// Get the name of each column in the table.

// Each array entry is a column name.

$columns = array_keys($results[0]);

 

// Print out a checkbox for each column.

echo "<form action='' method='POST'><div>";

foreach($columns as &$columnName) {

    echo "<input id=\"" . $columnName . "\" name=\"" . $columnName . "\" type=\"checkbox\" value=\"" . $columnName . "\" /><label for=\"" . $columnName . "\">" . $columnName . "</label>";

}

// Print out the submit button.

echo "</div><div><input name=\"submit\" type=\"submit\" value=\"Submit\" /></div></form>";

 

// On submit,

if(isset($_POST['submit'])) {

 

    // Get everything from the table.

    $db = JFactory::getDbo();

 

    $query = $db->getQuery(true);

 

    $query->select($db->quoteName('*'));

    $query->from($db->quoteName('Publication'));

 

    $db->setQuery($query);

 

    $result = $db->loadObjectList();

 

    // Create the table and the header row.

    echo "<table>";

        echo "<tr style=\"background-color:Gray;color:White\">";

            foreach($columns as &$columnName) {

                if (JRequest::getVar($columnName) == $columnName) {

                    echo "<th>" . $columnName . "</th>";

                }

            }

        echo "</tr>";

 

    // Print out each row of data

    foreach ($result as &$row) {

        // Print out each column that was checked. If the column was not checked, print out a blank column.

        echo "<tr>";

            foreach($columns as &$columnName) {

                if (JRequest::getVar($columnName) == $columnName) {

                    echo "<td>" . $row->$columnName . "</td>";

                }

            }

        echo "</tr>"; // Close out the row.

    }

 

    echo "</table>"; // Close out the table at the end of the loop.

 

}

 

?>{/source}