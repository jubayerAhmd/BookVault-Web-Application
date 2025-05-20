<?php
$servername = "localhost";
$username = "root";         // default username in XAMPP
$password = "";             // default password is empty
$database = "bookvault"; // Database name

//Create connection.
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// connection success message.
getAllConnectionDetails($servername, $conn, $database, $username, $password);



function getAllConnectionDetails($servername, $conn, $database, $username, $password)
{   
    echo '<br><br><br><br><br><br><div style="font-size: 30px; text-align: center; font-weight: bold; color: green;">
    -------MySQL Database: ['. $database .'] is Connected Successfully--------
    </div>';

    echo '<br><br><br><div style="font-size: 20px; text-align: center; font-weight: bold; color:rgb(8, 189, 202);">
    ------------------------------------------------Server Name is: ['. $servername .']------------------------------------------------
    </div>';

    echo '<br><br><br><div style="font-size: 20px; text-align: center; font-weight: bold; color: rgb(8, 189, 202);"> 
    -----------------------------------------Connection Type: ['. $conn->host_info .']---------------------------------------
    </div>';

    echo '<br><br><br><div style="font-size: 20px; text-align: center; font-weight: bold; color: rgb(8, 189, 202);">
    ---------------------------------------------' . $servername . ' IP Address is: 
    [<a href="http://' . gethostbyname('localhost') . '" target="_blank" 
    style="text-decoration: none; color: rgb(43, 77, 187);">' . gethostbyname('localhost') . '</a>]------------------------------------------
    </div>';


    echo '<br><br><br><div style="font-size: 20px; text-align: center; font-weight: bold; color: rgb(8, 189, 202);"> 
    -----------------------------------------------Used Apache Server Port is: ['. $_SERVER['SERVER_PORT'] .']-------------------------------------------
    </div>';

    echo '<br><br><br><div style="font-size: 20px; text-align: center; font-weight: bold; color: rgb(8, 189, 202);"> 
    ----------------------------------------------Used MySQL Server Port is: ['. getMySqlPort() .']-----------------------------------------
    </div>';


}


// Function to get the MySQL port number from XAMPP's my.ini file.
function getMySqlPort()
{
    // Define the full path to the my.ini file (double backslashes for Windows)
    $ini_path = "C:\\xampp\\mysql\\bin\\my.ini";

    // Read the contents of the file into an array (each line becomes an element)
    $ini_content = file($ini_path);

    // Initialize the variable to hold the port number
    $mysql_port = "";

    // Loop through each line of the ini file using a for loop
    for ($i = 0; $i < count($ini_content); $i++) 
    {
        // Trim whitespace from the beginning and end of the line
        $line = trim($ini_content[$i]);

        // Skip empty lines or lines that are commented out with # or ;
        if ($line === '' || $line[0] === '#' || $line[0] === ';') {
            continue; // Move to the next line
        }

        // Check if the line starts with 'port=' (case-sensitive)
        if (strpos($line, 'port=') === 0) {
            // Extract the value after 'port=' by removing the first 5 characters
            $mysql_port = trim(substr($line, 5));

            // Exit the loop once the port is found
            break;
        }
    }

    // Return the extracted MySQL port number.
    return $mysql_port;
}
    // Close the connection.
    $conn->close();
?>
