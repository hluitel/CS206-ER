<?php
include 'top.php';
 
function getPostData($field) {
    if(!isset($_POST[$field])) {
        $data = "";
        
    }else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
       
    }
    
    return $data;
    
    
}

function getGetData($field) {
    if(!isset($_GET[$field])) {
        $data = "";
        
    }else {
        $data = trim($_GET[$field]);
        $data = htmlspecialchars($data);
       
    }
    
    return $data;
    
    
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();

    $dataIsGood = true;
    
    $userName = getPostData("username");
    $passWord = getPostData("password");
        
    
    
    
    
    if($dataIsGood) {
        //$checkUser = 'select from tblUsers(fldUserName,fldPassword) where fldUsername = ? and fldPassword = ?';
        $checkUser = 'select * from tblUsers where fldUsername = ?';


        $providedInfo = [$userName];
        #$thisDatabaseReader->testSecurityQuery($checkUser);

        if($thisDatabaseReader->querySecurityOK($checkUser)){
            $ready = $thisDatabaseReader->sanitizeQuery($checkUser);
            
            $validateUser = $thisDatabaseReader->select($ready, $providedInfo);
            
            #print_r($thisDatabaseReader->select($ready, $providedInfo));
            #print(sizeof($validateUser));
            
            
            
            
        $test = $validateUser[0]['pmkUserID'];
        try{
            if(password_verify($passWord, $validateUser[0]['fldPassword'])) {
                $_SESSION["username"] = $userName;
                
                $_SESSION["key"] = $test;
                    
                //print($_SESSION["username"]);
                header("Location: index.php");
                die;    
            }
            else{
                print("<p>Incorrect Passoword</p>");
            }


            
           
        } catch (Exception $ex) {
             print("<p>Incorrect Passoword</p>");
            

        }
                        
            
            
            
            
        }
        
        
       
        
        //if($validateUser[0] == $providedInfo[0] && $validateUser[1] == $providedInfo[1]) {
      
    }
          
    
    
    
    

  

}
?>

		<form method='POST' action=''>
			<p class="form-input">
                            <input type="text" name="username" placeholder="Enter the User Name" required/>	
			<p class="form-input">
                            <input type="password" name="password" placeholder="password" required/>
                            
                        <h4>Don't Have An Account?</h4><a href="createAccount.php">Create Account</a>
                            
                            
                            
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
                </form>
</body>
</html>
