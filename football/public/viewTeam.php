<?php

include('/projects/football/private/initialise.php');

// query id
$id = htmlspecialchars($_GET["id"])-1;
echo 'Team ',$arr[$id]["name"],' whose manager is ',$arr[$id]["manager"],' and has a current rating of ',$arr[$id]["rating"];
?>

