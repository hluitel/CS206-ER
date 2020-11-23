<?php
include 'top.php';

session_start();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


//general
$dataIsGood = true;
$firstName = "";
$lastName = "";
$numRating = "";

//tblPlayers 


#if(isset($_POST['btnSubmit'])) {

if(isset($_POST['Submit'])) {

  
if($dataIsGood){
    
    $id = $_SESSION['key'];
    
    $userLogin = $id;
    $firstName = getPostData("txtFirstName");
    $lastName = getPostData("txtLastName");
    $numRating = getPostData("numRating");
    
      
    if($firstName == "" || $lastName == "" || $numRating == "") {
        print("<p>Please Enter the following info</p>");
        $dataIsGood = false;
    }


    //tblAttributues
    

    $Pace = getPostData("numPace");
    $Skills = getPostData("numSkills");
    $Shooting = getPostData("numShooting");
    $Passing = getPostData("numPassing");
    $Heading = getPostData("numHeading");
    $Strength = getPostData("numStrength");
    
    $data = array($userLogin,$firstName,$lastName,$numRating);
    
    
    //test

    /*
    $tblPlayerQuery = "INSERT INTO tblPlayers(pfkUserID, fldFirstName, fldLastName, fldRating) values(?,?,?,?)";
    $thisDatabaseWriter->insert($tblPlayerQuery, $data);
`   */
    
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    
    
    
    $tblPlayerQuery = "INSERT INTO tblPlayers(pfkUserID, fldFirstName, fldLastName, fldRating) values(?,?,?,?)";
 
    $thisDatabaseReader->testSecurityQuery($tblPlayerQuery,0);
    if($thisDatabaseWriter->querySecurityOK($tblPlayerQuery,0)){
            $readyTOGO = $thisDatabaseWriter->sanitizeQuery($tblPlayerQuery);
            $thisDatabaseWriter->insert($readyTOGO, $data);
            

        }
        
     else{
          print("<p>There was error Inserting the values</p>");
      }
    
    $lastInsert = $thisDatabaseWriter->lastInsert();
    
    print($lastInsert);
    
    $tblAtrributeQuery = "INSERT INTO tblAtrributes (pfkPlayerID, fldPace, fldSkills, fldShooting, fldPassing, fldHeading, fldStrength) values(?,?,?,?,?,?,?)";
    //$tblAtrributeQuery = "INSERT INTO tblAtrributes (pfkPlayerID, fldPace, fldSkills, fldShooting, fldPassing, fldHeading, fldStrength) where pfkPlayerID = ?, fldPace = ?, fldSkills = ?, fldShooting = ?, fldPassing = ?, fldHeading = ?, fldStrength = ? ";
    //$thisDatabaseReader->testSecurityQuery($tblAtrributeQuery);
    $dataAtrribute = array($lastInsert, $Pace, $Skills,$Shooting,$Passing, $Heading,$Strength);
    
     if($thisDatabaseWriter->querySecurityOK($tblAtrributeQuery,0)){
            $dataReady = $thisDatabaseWriter->sanitizeQuery($tblAtrributeQuery);
            $thisDatabaseWriter->insert($dataReady, $dataAtrribute);
            

            
            
        }
        
      else{
          print("<p>There was error Inserting the values</p>");
      }
        
}

}


      
?>


<form method='POST' action=''>
    
                <legend>Enter Your Player Info</legend>

                <p>
                    <label class ="required text-field" for="txtFirstName">First Name</label>
                    <input autofocus
                               id="txtFirstName"
                           maxlength="45"
                           name="txtFirstName"
                           onfocus="this.select()"
                           placeholder="FirstName"
                           tabindex="100"
                           type="text"
                           value=""
                           required
                           >
                </p>

                <p>

                    <label class ="required text-field" for="txtLasttName">Last Name</label>
                    <input autofocus
                               id="txtLastName"
                           maxlength="45"
                           name="txtLastName"
                           onfocus="this.select()"
                           placeholder="LastName"
                           tabindex="100"
                           type="text"
                           value=""
                           required
                           >
                </p>
                
                
                 <p>

                    <label class ="required text-field" for="numRating">Rating</label>
                    <input autofocus
                          id="txtRating"
                           maxlength="45"
                           name="numRating"
                           onfocus="this.select()"
                           placeholder="Rating"
                           tabindex="100"
                           type="number"
                           value=""
                           min="1"
                           required
                           >
                </p>
                
                
  
    <fieldset class ="listbox">
    <label for="position">Choose a Position</label>

    <select name="position" id="position" required>
  <option value="GK">Center Back</option>
  <option value="CB">Center Back</option>
  <option value="LB">Left Back</option>
  <option value="RB">Right Back</option>
  <option value="CM">Central Midfielder</option>
  <option value="LW">Left Winger</option>
  <option value="RW">Right Winger</option>
  <option value="ST">Striker</option>
  
</select>
    
    </fieldset>
                
                
<!-- Skills Section -->
                 <p>

                    <label class ="required text-field" for="numPace">Pace</label>
                    <input autofocus
                          id="txtRating"
                           maxlength="45"
                           name="numPace"
                           onfocus="this.select()"
                           placeholder="Pace"
                           tabindex="100"
                           type="number"
                           value=""
                           min="1"
                           required
                           >
                </p>
                
                
                 <p>

                    <label class ="required text-field" for="numSkills">Skills</label>
                    <input autofocus
                          id="txtRating"
                           maxlength="45"
                           name="numSkills"
                           onfocus="this.select()"
                           placeholder="Rating"
                           tabindex="100"
                           type="number"
                           value=""
                           min="1"
                           required
                           >
                </p>
                
                
                 <p>

                    <label class ="required text-field" for="numShooting">Shooting</label>
                    <input autofocus
                          id="txtRating"
                           maxlength="45"
                           name="numShooting"
                           onfocus="this.select()"
                           placeholder="Shooting"
                           tabindex="100"
                           type="number"
                           value=""
                           min="1"

                           required
                           
                           >
                </p>
                
                
                 <p>

                    <label class ="required text-field" for="numPassing">Passing</label>
                    <input autofocus
                          id="txtRating"
                           maxlength="45"
                           name="numPassing"
                           onfocus="this.select()"
                           placeholder="Passing"
                           tabindex="100"
                           type="number"
                           value=""
                           min="1"
                           required
                           >
                </p>
                
                <p>

                    <label class ="required text-field" for="numHeading">Heading</label>
                    <input autofocus
                          id="txtRating"
                           maxlength="45"
                           name="numHeading"
                           onfocus="this.select()"
                           placeholder="Heading"
                           tabindex="100"
                           type="number"
                           value=""
                           min ="1"
                           required
                           >
                </p>
                
                 
                <p>

                    <label class ="required text-field" for="numStrength">Strength</label>
                    <input autofocus
                          id="txtRating"
                           maxlength="45"
                           name="numStrength"
                           onfocus="this.select()"
                           placeholder="Strength"
                           tabindex="100"
                           type="number"
                           value=""
                           min="1"
                           required
                           >
                </p>
                
  

          <input type="submit" name = "Submit"/>

</form>

</body>
</html>
