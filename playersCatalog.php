<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'top.php';
include 'functions.php';

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
    print("<p>After Testing</p>");

  
    
    if($dataIsGood){
        $Name = getPostData("txtSortName");
        $Country = getPostData("txtSortNationality");
        
        print($Name);
        print($Country);
        
        if($Name == "") {
            $tblQuery = 'select * from tblFifaPlayers where fldNationality = ?';
            
            if($thisDatabaseReader->querySecurityOK($tblQuery)){
            $readyTOGO = $thisDatabaseReader->sanitizeQuery($tblQuery);
            $playerInfo = $thisDatabaseReader->select($readyTOGO, array($Country));
            print(sizeof($playerInfo));
            print("<p>Got Name Empty</p>");

            

        }
        
            
        }
        
        elseif($Country == "") {
            $tblQuery = 'select * from tblFifaPlayers where fldName = ?';
            if($thisDatabaseReader->querySecurityOK($tblQuery)){
            $readyTOGO = $thisDatabaseReader->sanitizeQuery($tblQuery);
            $playerInfo = $thisDatabaseReader->select($readyTOGO, array($Name));
            print(sizeof($playerInfo));
            print("<p>Got Country Empty</p>");


            
            
        }
        
        }
        
        elseif($Name != "" && $Country != ""){
            $tblQuery = 'select * from tblFifaPlayers where fldName=? , fldNationality = ?';
            $data = array($Name, $Country);
            if($thisDatabaseReader->querySecurityOK($tblQuery,1,1)){
            $readyTOGO = $thisDatabaseReader->sanitizeQuery($tblQuery);
            $playerInfo = $thisDatabaseReader->select($readyTOGO, $data);
            print(sizeof($playerInfo));
            print("<p>Got here</p>");


            
            
        }
        }
        else{
            print("<p>Please Enter atleast one info</p>");
        }
     
        
    }
    
    ?>

<table>
    <tr>
         <th>Name</th>
                <th>Nationality</th>
                <th>Position</th>
                <th>Ranking</th>
                <th>Age</th>               
    </tr>
    
    
    <?php
    
    foreach($playerInfo as $player) {
         print '<tr>';
            print '<td>' . $player['fldName'] . '</td>';
            print '<td>' . $player['fldNationality'] . '</td>';
            print '<td>' . $player['fldPosition'] . '</td>';
            print '<td>' . $player['fldRanking'] . '</td>';
            print '<td>' . $player['fldAge'] . '</td>';
           print '</tr>';
    }
    
}
    
    ?>
    
    
</table>
    


   		<form method='POST' action=''>

                            <input type="text" name="txtSortName" placeholder="Name" />	
			<p class="form-input">
                            <input type="text" name="txtSortNationality" placeholder="nationality" />
                            
                            <input type="submit" name = "Submit"/>

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
