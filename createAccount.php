<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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

    $dataIsGood = true;
    
    $userName = getPostData("username");
    $passWord = getPostData("password");
    $email = getPostData("email");
    
    $passwordHashed = password_hash($passWord,PASSWORD_DEFAULT);
   
    
        
    
    
    print($userName);
    print($passwordHashed);
    
    if($dataIsGood) {
        $checkUser = 'insert into tblUsers(fldEmail,fldUserName,fldPassword) values(?,?,?)';
        $providedInfo = [$email, $userName, $passwordHashed];
        #$thisDatabaseReader->testSecurityQuery($checkUser,1,1);

        if($thisDatabaseWriter->querySecurityOK($checkUser,0)){
            $checkUser = $thisDatabaseWriter->sanitizeQuery($checkUser);
            $validateUser = $thisDatabaseWriter->insert($checkUser, $providedInfo);
            
        }
        
        if($validateUser){
                     echo "<p>Your account has been created.</p>",
             "<p><a href='login.php'>Login</a></p></html>";
                     
               die;
            
        }
        
        else{
            print("<p>Please Choose a different Username." . $userName . " is taken</p>");
            
        }
        
    }
          
    
    
    
    

  

}
?>

<form method='POST' action='createAccount.php'>
                        <p class="form-input">
                            <input type="text" name="email" placeholder="Enter your Email" required/>	
        
			<p class="form-input">
                            <input type="text" name="username" placeholder="Enter the User Name" required/>	
			<p class="form-input">
                            <input type="password" name="password" placeholder="password" required/>
			<input type="submit" type="submit" value="Create Account"/>
                </form>
</body>
</html>


