<?php
include 'top.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




$query = "insert into tblPlayers(fldFirstName, fldLastName, fldRating) values('".$_POST['txtFirstName']."','".$_POST['txtLastName']."','".$_POST['numRating']."')";
$thisDatabaseWriter->select($query, '');

$lastInsert = $thisDatabaseWriter->lastInsert();
print($lastInsert);

$queryChild = "INSERT INTO tblAtrributes (pfkPlayerID, fldPace, fldSkills, fldShooting, fldPassing, fldHeading, fldStrength) "
        . "VALUES(".$lastInsert.", '".$_POST['numPace']."', '".$_POST['numSkills']."', '".$_POST['numShooting']."', '".$_POST['numPassing']."', '".$_POST['numHeading']."', '".$_POST['numStrength']."');" ;

$thisDatabaseWriter->select($queryChild,'');

?>


<table>
            <caption><strong>Your Player</strong>
               <tr id = "tabletop">
			<th>Player Name</th>
			<th>Rating</th>
			<th>Pace</th>
			<th>Skills</th>
			<th>Shooting</th>
			<th>Passing</th>
			<th>Heading</th>
			<th>Strength</th>
               </tr>
               
               
                

                
                
</table>


