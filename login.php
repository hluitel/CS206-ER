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

    $dataIsGood = true;
    
    $userName = getPostData("username");
    $passWord = getPostData("password");
    
    print($userName);
    print($passWord);
    
    if($dataIsGood) {
        $checkUser = 'select fldUserName, fldPassword FROM tblUsers where fldUserName = ? and fldPassword = ?';
        $providedInfo = [$userName, $passWord];
        #$thisDatabaseReader->testSecurityQuery($checkUser,1,1);

        if($thisDatabaseReader->querySecurityOK($checkUser,1,1)){
            $checkUser = $thisDatabaseReader->sanitizeQuery($checkUser);
            $validateUser = $thisDatabaseReader->select($checkUser, $providedInfo);
            
        }
        
        
       
        print_r($providedInfo[0], $providedInfo[1]);
        
        //if($validateUser[0] == $providedInfo[0] && $validateUser[1] == $providedInfo[1]) {
        if(sizeof($validateUser) == 1) {
            print("It worked");
            
        }
        else{
            print("Nope It didnot");
        }
    }
          
    
    
    
    

  

}
?>

		<form method='POST' action=''>
			<p class="form-input">
                            <input type="text" name="username" placeholder="Enter the User Name" required/>	
			<p class="form-input">
                            <input type="password" name="password" placeholder="password" required/>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
                </form>
</body>
</html>
