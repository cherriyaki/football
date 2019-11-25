<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

<style>
* {
    font-family: 'Montserrat', sans-serif;
}
</style>

</head>

<?php


//include('/projects/football/private/database.php');

// SQL connection
//$db = db_connect();

//// convert json file contents to a string
//$str = file_get_contents('/projects/football/private/teams.json');
//// convert string to array
//$arr = json_decode($str, true);

 // array of associative arrays, each representing a team
//var_dump($arr); // to see what the array looks like

 // Switch on all errors
  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);
  ini_set('display_startup_errors', TRUE);

  // Credentials
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $dbname = 'teams';

  // 1. Create a database connection
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  // 2. Perform database query
  $query = "SELECT * FROM teams";
  $result_set = mysqli_query($connection, $query);
  
  // add each row to array
  
  $arr = array();

$index = 0;
while($team = mysqli_fetch_assoc($result_set)) {
    $arr[$index] = $team;
    $index++;
}
  
  include('/projects/football/private/functions.php');


?>