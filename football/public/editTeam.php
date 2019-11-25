<?php

include('/projects/football/private/initialise.php');

// define variables and set to empty values
$nameErr = $mngErr = $ratingErr = "";
$name = $manager = $rating = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // require name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } 
    else {
        $name = test_input($_POST["name"]);
        
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    
        // check if name is at least 3 letters
        if (strlen($name)<3 || strlen($name)>255) {
            $nameErr = "Must be 3 to 255 characters long";
        }
        
        // change name in database
        
    }
    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function updateTable($id, $field, $value) {
    $query = "UPDATE teams SET "$field"='"$value"' WHERE id="$id"";
    mysqli_query($connection, $query);
}
?>

<form method="post" action="">


