<?php
//// convert json file contents to a string
//$str = file_get_contents('/projects/football/private/teams.json');
//// convert string to array
//$arr = json_decode($str, true);

//https://stackoverflow.com/questions/7491768/get-rows-from-mysql-table-to-php-arrays


function newRating($home, $away, $homeG, $awayG, $hoa) {
    // access global variable, more info on https://www.geeksforgeeks.org/how-to-declare-a-global-variable-in-php/
    global $arr;
    // determine which team we are calculating for
    if ($hoa == $home) {
        $team = $home-1;
        $opp = $away-1;
        $teamG = $homeG;
        $oppG = $awayG;
        $drAdd = 100;
    }
    elseif ($hoa == $away) {
        $team = $away-1;
        $opp = $home-1;
        $teamG = $awayG;
        $oppG = $homeG;
        $drAdd = 0;
    }

    // determine result: 'draw', true (win) or false (loss)    
    if ($homeG == $awayG) 
        $result = 0.5;
    else
        $result = ($teamG > $oppG);
    
    // calc G
    $dg = abs($homeG - $awayG);
    if ($dg < 2) $g = 1;
    elseif ($dg = 2) $g = 3/2;
    else $g = (11+$dg)/8;
    
    // calc Wactual
    $Wa = $result;
    
    // calc Wexpected
    $dr = abs($arr[$team]["rating"]-$arr[$opp]["rating"]) + $drAdd;
    $We = 1/(pow(10,(-$dr)/400)+1);
    
    // calc P
    $p = 50 * $g * ($Wa - $We);

    // calc Rnew
    $Rn = round($arr[$team]["rating"] + $p);
    
    return $Rn;
    
}



//echo newRating(4,1,3,1,4),' ';
//echo newRating(4,1,3,1,1),' ';

?>

