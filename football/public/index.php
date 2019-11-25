<?php

include('/projects/football/private/initialise.php');

// get information if form was submitted
if (isset($_POST["submit"])) {
    $homeID = $_POST["homeID"];
    $awayID = $_POST["awayID"];
    $homeG = $_POST["homeG"];
    $awayG = $_POST["awayG"];
}
else {
    $homeID = 0;
    $awayID = 0;
    $homeG = 0;
    $awayG = 0;
}

echo "<h1>Team Information</h1><hr>";

// make table and headers
echo "<table cellpadding='10' style='text-align:left;'><tr><th>Team</th><th>Manager</th><th>Current Rating</th></tr>";

// make each row
for ($i = 0; $i < sizeof($arr); $i++) {

    echo "<tr>";
    
    // make cells within each row
    echo "<td>",$arr[$i]["name"],"</td>";
    echo "<td>",$arr[$i]["manager"],"</td>";
    
    echo "<td>";
    
    // display new rating
    if ($arr[$i]["id"] == $homeID) echo newRating($homeID, $awayID, $homeG, $awayG, $homeID);
    elseif ($arr[$i]["id"] == $awayID) echo newRating($homeID, $awayID, $homeG, $awayG, $awayID);
    else echo $arr[$i]["rating"];
    
    echo "</td>";
    
    // View, Edit, Delete buttons
    $id = $arr[$i]["id"];
    echo "<td>";
    echo "<a href='viewTeam.php/?id=",$id,"'>View</a>",' ';
    echo "<a href='editTeam.php/?id=",$id,"'>Edit</a>",' ';
    echo "<a href='deleteTeam.php/?id=",$id,"'>Delete</a>";
    echo "</td>";
    
    echo "</tr>";
}
echo "</table>";




?>

<html>
<h1>Input the results of a match</h1>
<hr>
<form action="" method="post">

  Please select the name of the home team: 
  <select name="homeID">
    <option value="1">Burlington Drifters</option>
    <option value="2">Salem Boulevardiers</option>
    <option value="3">Shelbyville Shelbyvillians</option>
    <option value="4">Springfield Isotopes</option>
  </select>
      <br><br>
  Please type the number of goals scored by the home team: 
  <input name="homeG" type="number">
  <br><br>

      Please select the name of the opposing team: 
    <select name="awayID">
    <option value="1">Burlington Drifters</option>
    <option value="2">Salem Boulevardiers</option>
    <option value="3">Shelbyville Shelbyvillians</option>
    <option value="4">Springfield Isotopes</option>
  </select>
  <br><br>
    Please type the number of goals scored by the opposing team: 
<input name="awayG" type="number">
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form> 
</html>

<?php 
include('/projects/football/private/footer.php');
?>


