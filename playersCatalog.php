<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'top.php';
include 'functions.php';
//session_start();


/**
$tblQuery = 'select * from tblFifaPlayers';
    
$playerInfo = $thisDatabaseReader->select($tblQuery,'');
print(sizeof($playerInfo));
*/


$dataIsGood = true;
$Name= "";
$Country = "";
$playerInfo = "";

#print("<p>testing</p>");


if(isset($_POST['Submit'])) {
    //print("<p>After Testing</p>");
    

  
    
    if($dataIsGood){
        $Name = getPostData("txtSortName");
        $Country = getPostData("txtSortNationality");
        $displayPlayer = getPostData("displayPlayer");
        
        
        
        if($displayPlayer != 'fantasy' || $displayPlayer != 'global'){
            //print '<p class = "mistake"> Please Select Atleast One Option for Displaying Players </p>';
            $dataIsGood = false;
        }
        
        
        
        //print($Name);
        //print($Country);
        
        
    if($displayPlayer == 'global')
    {
        if($Name == "" && $Country != "") {
            $tblQuery = 'select * from tblFifaPlayers where fldNationality = ?';
            
            if($thisDatabaseReader->querySecurityOK($tblQuery)){
            $readyTOGO = $thisDatabaseReader->sanitizeQuery($tblQuery);
            $playerInfo = $thisDatabaseReader->select($readyTOGO, array($Country));
            //print(sizeof($playerInfo));
            //print("<p>Got Name Empty</p>");

            

        }
        
            
        }
        
        elseif($Country == "" && $Name != "") {
            $tblQuery = 'select * from tblFifaPlayers where fldName = ?';
            if($thisDatabaseReader->querySecurityOK($tblQuery)){
            $readyTOGO = $thisDatabaseReader->sanitizeQuery($tblQuery);
            $playerInfo = $thisDatabaseReader->select($readyTOGO, array($Name));
            //print(sizeof($playerInfo));
            //print("<p>Got Country Empty</p>");


            
            
        }
        
        
        
        }
        
        elseif($Name != "" && $Country != ""){
            $tblQuery = 'select * from tblFifaPlayers where fldName=? and fldNationality=?';
            $data = array($Name, $Country);
            if($thisDatabaseReader->querySecurityOK($tblQuery,1,1)){
            $readyTOGO = $thisDatabaseReader->sanitizeQuery($tblQuery);
            $playerInfo = $thisDatabaseReader->select($readyTOGO, $data);
            //print(sizeof($playerInfo));
            //print("<p>Got here</p>");


            
            
        }
        
        }
        
              
        
        print "<table class='playersTbl'>";
        print '<tr class="tblrow">';
         print '<th>Name</th>';
               print '<th>Nationality</th>';
                print '<th>Position</th>'; 
                 print '<th>Ranking</th>'; 
                  print '<th>Age</th>'; 
                   print '<th>Club</th>'; 

    print '</tr>';
    
    
   
    
    if(is_array($playerInfo)) {
        #print(sizeof($playerInfo));
        
    
    
    foreach($playerInfo as $player) {
         print '<tr>';
            print '<td>' . $player['fldName'] . '</td>';
            print '<td>' . $player['fldNationality'] . '</td>';
            print '<td>' . $player['fldPosition'] . '</td>';
            print '<td>' . $player['fldRanking'] . '</td>';
            print '<td>' . $player['fldAge'] . '</td>';
            print '<td>' . $player['fldClub'] . '</td>';
            print '</tr>';
    }
    
    
    
    
    }
        
        
        
        else{
            print("<p class = 'mistake'>Please Enter Atleast one info</p>");
        }
        
        
        
        
         print '</table>';
    
        
        
        
        
        
        
        
    } else if($displayPlayer == "fantasy"){
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
         
        
          
    print "<table class='playersTbl'>";
    print '<tr class="tblrow">';
         print '<th>First Name</th>';
               print '<th>Last Name</th>';
                print '<th>Rating</th>';           

    print '</tr>';
    
    
   
    
    if(is_array($playerInfo)) {
        //print(sizeof($playerInfo));
        
    
    
    foreach($playerInfo as $player) {
         print '<tr>';
            print '<td>' . $player['fldFirstName'] . '</td>';
            print '<td>' . $player['fldLastName'] . '</td>';
            print '<td>' . $player['fldRating'] . '</td>';
            print '</tr>';
    }
    
    
    
    }
    
    print '</table>';
    
    
    
    
        
        
        
        
        
    }
     
        
        
    }
    
    
}
    
    ?>
    
    
    


<form method='POST' action='playersCatalog.php'>
                     <fieldset>
                            <legend>Display Which Players: Your Fantasy Team Players or Global Players</legend>
                        <p class="radio">
                            <input type="radio" id="fantasy" name="displayPlayer" value="fantasy">
                            <label for="fantasy">Your Fantasy Team</label>
                            <input type="radio" id="global" name="displayPlayer" value="global">
                            <label for="global">Global Players</label>
                            
                        </p>  
                        
                        </fieldset>

                            <input type="text" name="txtSortName" placeholder="Name" value = "<?php print $Name; ?>"/>	
			<p class="form-input">
                            <input type="text" name="txtSortNationality" placeholder="nationality" value = "<?php print $Country; ?>"/>
                           
                        </p>
                        <p>
                            <input type="submit" name = "Submit" value="Submit"/>
                        </p>
 </form>



<?php

/**


<form method='POST' action="">

      <fieldset class ="Name">
                <legend>Find Your Player</legend>

                <p>
                    <label class ="required text-field" for="txtSortName">Name</label>
                    <input autofocus
                           id="txtFirstName"
                           maxlength="45"
                           name="txtFirstName"
                           onfocus="this.select()"
                           placeholder="Name"
                           tabindex="100"
                           type="text"
                           value=""
                           
                           >
                </p>
                
                 <p>

                    <label class ="required text-field" for="txtSortNationality">Nationality</label>
                    <input autofocus
                           id="txtLastName"
                           maxlength="45"
                           name="txtLastName"
                           onfocus="this.select()"
                           placeholder="Nationality"
                           tabindex="100"
                           type="text"
                           value=""
                           
                           >
                </p>
                
      </fieldset>
    
       <fieldset class ="submit">
                <legend></legend>
                <input class ="button" id="btnSubmitSort" name ="btnSubmitSort" tabindex="900" type="submit" value="Submit">
            </fieldset>
                
        
</form>
 * 
 * 
 */

?>



</body>

</html>