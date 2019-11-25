<?php

include('/projects/football/private/functions.php');

echo "<h1>New Ratings</h1><hr>";

$homeID = $_POST["homeID"];
$awayID = $_POST["awayID"];
$homeG = $_POST["homeG"];
$awayG = $_POST["awayG"];

echo "The rating of the home team, ",$arr[$homeID-1]["name"]," was ",$arr[$homeID-1]["rating"],". Now it is ",newRating($homeID, $awayID, $homeG, $awayG, $homeID),".<br>";
echo "The rating of the opposing team, ",$arr[$awayID-1]["name"]," was ",$arr[$awayID-1]["rating"],". Now it is ",newRating($homeID, $awayID, $homeG, $awayG, $awayID),".";



?>