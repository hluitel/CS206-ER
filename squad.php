<?php
include 'top.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function getData($field) {
    if(!isset($_POST[$field])) {
        $data = "";
        
    }else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
       
    }
    
    return $data; 
    
}

function getDataG($field) {
    if(!isset($_GET[$field])) {
        $data = "";
        
    }else {
        $data = trim($_GET[$field]);
        $data = htmlspecialchars($data);
       
    }
    
    return $data;
      
}

?>




<form method='post' action='save.php' id="playerBuilder">
    
            <fieldset class ="Name">
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
                           >
                </p>
                
                
  
    <fieldset class ="listbox">
    <label for="position">Choose a Position</label>

<select name="position" id="position">
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
                           >
                </p>
                
  

     </fieldset>
    <fieldset class ="submit">
                <legend></legend>
                <input class ="button" id="btnSubmit" name ="btnSubmit" tabindex="900" type="submit" value="Submit">
            </fieldset>
</form>

</body>
</html>
