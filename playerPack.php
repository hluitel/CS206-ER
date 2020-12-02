<?php

include 'top.php';
include 'functions.php';


$playerInfo = "";
$$playerInfoGlobal = "";
 $tblQuery = 'select * from tblPlayers where pfkUserID = ?';
        
        $arr = $_SESSION['key'];

         if($thisDatabaseReader->querySecurityOK($tblQuery)){
            $readyTOGO = $thisDatabaseReader->sanitizeQuery($tblQuery);
            $playerInfo = $thisDatabaseReader->select($readyTOGO, array($arr));
            
            if(sizeof($playerInfo) == 0) {
                print("<p>You Got No Players in Your Fantasy Team");
                exit;
            }
   
        
         }
        
?>    
    
<form class="playerPackForm" method="post">
   <p class="listbox2">  
    <label for="player">Choose a Player</label>

    <select name="player" id="player" required>
        
     <?php
         foreach($playerInfo as $play){
            print("<option value='".$play['pmkPlayerID']."'>'".$play['fldFirstName']. ' ' . $play['fldLastName']. ' ' .$play['fldRating']."'</option>");
  
    }
       
   ?>
        
</select>
                </p>
                
                <input type="submit" name = "Submit" value="Submit"/>

</form>

<?php

$dataIsGood = true;
if(isset($_POST['Submit'])) {
    
    $valUser1 = getPostData('player'); 
    if($valUser1 == ""){
        $dataIsGood = false;
    }
    
    $check = false;
    foreach($playerInfo as $playInfo){

        
        if($playInfo['pmkPlayerID'] == $valUser1) {
            $check = true;
        }
    }
    
    if($check == false) {
        print("<p>There was an Error. Please Select Different Player</p>");
        $dataIsGood = false;
        
    }
    
    
    
    
    
    
    $randomNum = rand(1,17981);
    
if($dataIsGood)
{
    $tblQuery = 'select * from tblPlayers where pmkPlayerID = ?';
        
        $arr = $_SESSION['key'];

         if($thisDatabaseReader->querySecurityOK($tblQuery)){
            $readyTOGO = $thisDatabaseReader->sanitizeQuery($tblQuery);
            $playerInfoTwo = $thisDatabaseReader->select($readyTOGO, array($valUser1));
            
            if(sizeof($playerInfo) == 0) {
                print("<p>You Got No Players in Your Fantasy Team");
                exit;
            }
   
        
         }
          
         
 $tblQuery2 = 'select * from tblFifaPlayers where pmkFifaPlayersID = ?';
 
         if($thisDatabaseReader->querySecurityOK($tblQuery2)){
            $readyTOGO = $thisDatabaseReader->sanitizeQuery($tblQuery2);
            $playerInfoGlobal = $thisDatabaseReader->select($readyTOGO, array($randomNum));
       
         
         }
         
         
         $valUser = $playerInfoTwo[0]['fldRating'];
         
         if(is_array($playerInfoGlobal)){
             $fldRanking = $playerInfoGlobal[0]['fldRanking'];
         }
         
          $checkUserThree = "UPDATE tblUserRewards SET fldPoints = ? where pfkUserID = ?";


                    //$timeRecord = 
                   
                    //$thisDatabaseReader->testSecurityQuery($checkUserThree,1,0,0,0,0);
                   
        if($fldRanking > $valUser){
            print("<h4 class='lost'>You Lost</h4>");
             $fldPoints = ($_SESSION['points'] - 50);
              $arrTwo = array($fldPoints,$_SESSION['key']);
              
                if($thisDatabaseWriter->querySecurityOK($checkUserThree,1,0,0,0,0)){
                    $ready = $thisDatabaseWriter->sanitizeQuery($checkUserThree);
                    $validateUserRewardOne = $thisDatabaseWriter->update($ready, $arrTwo);
                    }
                    
        }
        
        else if($fldRanking < $valUser){
            print("<h4>You Won</h4>");
            
             $fldPoints = ($_SESSION['points'] + 50);
              $arrTwo = array($fldPoints,$_SESSION['key']);
              
                if($thisDatabaseWriter->querySecurityOK($checkUserThree,1,0,0,0,0)){
                    $ready = $thisDatabaseWriter->sanitizeQuery($checkUserThree);
                    $validateUserRewardOne = $thisDatabaseWriter->update($ready, $arrTwo);
                    }
        }
        
        else if($fldRanking == $valUser){
            print("<h4>Tied</h4>");
            
             $fldPoints = ($_SESSION['points'] + 25);
              $arrTwo = array($fldPoints,$_SESSION['key']);
              
                if($thisDatabaseWriter->querySecurityOK($checkUserThree,1,0,0,0,0)){
                    $ready = $thisDatabaseWriter->sanitizeQuery($checkUserThree);
                    $validateUserRewardOne = $thisDatabaseWriter->update($ready, $arrTwo);
                    }
            
        }
        
        
        ?>
        
       <table class="tblPlayerPack">
    <tr>
        <th class="tblPlayerPackH">Your Player</th>
        <th class="tblPlayersPackhead">Opponent Player</th>
    </tr>
    
    <tr>
        <td><?php print($playerInfoTwo[0]['fldFirstName'] . $playerInfoTwo[0]['fldLastName']);?> </td>
        <td><?php print($playerInfoGlobal[0]['fldName']);?></td>
    </tr>
    
    <tr>
        <td><?php print($playerInfoTwo[0]['fldRating']); ?></td>
        <td><?php print($playerInfoGlobal[0]['fldRanking']); ?></td>
    </tr>
    
</table>
        
        
         

<?php
}
}



?>
