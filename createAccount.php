<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
   print PHP_EOL . '<!--include Libraries-->' . PHP_EOL;  
     print '<!-- begin including libraries -->';     
        include 'lib/constants.php';
        include LIB_PATH . '/Connect-With-Database.php';
        print '<!-- libraries complete-->';

    

include 'functions.php';


$userName = "";
$passWord = "";
$email = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $dataIsGood = true;
    
    $userName = getPostData("username");
    $passWord = getPostData("password");
    $email = getPostData("email");
    
    if($userName == "") {
        print("<p class='mistake'> Please Enter your username");
        $dataIsGood = false;
    }
    
    if($passWord == "") {
        print("<p class='mistake'> Please Enter your password");
        $dataIsGood = false;
    }
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if($email == "") {
       print("<p class='mistake'> Please Enter your Email");
       $dataIsGood = false;

        
    }
    else if(!filter_var($email, FILTER_SANITIZE_EMAIL)){
        
               print("<p class='mistake'> Incorrect Email Address");
               $dataIsGood = false;

        
    }
    
    
    
    $passwordHashed = password_hash($passWord,PASSWORD_DEFAULT);
   
    
        
    
    
    //print($userName);
    //print($passwordHashed);
    
    if($dataIsGood) {
        $checkUser = 'insert into tblUsers(fldEmail,fldUserName,fldPassword) values(?,?,?)';
        $providedInfo = [$email, $userName, $passwordHashed];
        #$thisDatabaseReader->testSecurityQuery($checkUser,1,1);

        if($thisDatabaseWriter->querySecurityOK($checkUser,0)){
            $checkUser = $thisDatabaseWriter->sanitizeQuery($checkUser);
            $validateUser = $thisDatabaseWriter->insert($checkUser, $providedInfo);
            
        }
        
        $idKnow = $thisDatabaseWriter->lastInsert();
        
        if($validateUser){
                     echo "<p>Your account has been created.</p>";
                
            $check = 'select * from tblUsers where pmkUserId = ?';
            $checkTwo = 'insert into tblUserRewards(pfkUserID,fldPoints) values(?,?)';
            $points = 100;
            $arr = array($idKnow,$points);
                     
            if($thisDatabaseWriter->querySecurityOK($check)){
            $checkUser = $thisDatabaseWriter->sanitizeQuery($check);
            $validateUser = $thisDatabaseWriter->select($check, array($idKnow));
            
            
        }
                      
            if($thisDatabaseWriter->querySecurityOK($checkTwo,0)){
            $checkUser = $thisDatabaseWriter->sanitizeQuery($checkTwo);
            $validateUser = $thisDatabaseWriter->insert($checkTwo,$arr);

        }
        
            
            
            
                             
            $to = $email;
            $subject = 'Created An Account at Fifa';
            $cc = "";
            $bcc = "";
            $message = "";
            
            $from = "Website Admin <hluitel@uvm.edu>";
            
            $headers = "From: " . $from . "\r\n";
            $headers .= "Reply-To: ". $from . "\r\n";
            //$headers .= "CC: susan@example.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            
            
            $message = '<html><body>';
            $message .= '<h1 style="color:darkgreen;">Hello</h1>';
            $message .= '<p style="color:080;font-size:18px;">You successfully created an account</p>';
            
            //seeif this passes validation
            $message .= '<p style="color:#080;font-size:18px;">Your Username is ' . $userName . '</p>';
            
            $message .= '<p>For Inquiry, please contact us at hluitel@uvm.edu</h4>';

            
            $message .= '<h4>Thank You for Using Our Service</h4>';

            
            $message .= '</body></html>';
            

            
            try{
                mail($to,$subject,$message, $headers);

                
            } catch (Exception $ex) {
                print("<p>There was Error Sending the Confirmation Email");

            }
            
            
            

            
            
              header("Location: index.php");
              die; 
            
        }
        
        else{
            print("<p>Please Choose a different Username " . $userName . " is taken</p>");
            
        }
        
    }
          
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>  
        <title>A New View PhotoGraphy</title>

        <meta charset="utf-8">
        <meta name="author" content="Hari Luitel">
        <meta name="description" content="wonderful pictures, gallary, nature,burlington pictures, vermont, a new view, shutter, cool pictures,">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./custom.css" type="text/css" media="screen">
        
    </head>
    
<body id="createAccount">
<form method='POST' action='createAccount.php' class="login">
    
                        <p class="form-input">
                            <input type="text" name="email"  value = "<?php print $email ?>" placeholder="Enter your Email" required/>	
        
			<p class="form-input">
                            <input type="text" name="username" value = "<?php print $userName ?>" placeholder="Enter the User Name" required/>	
			<p class="form-input">
                            <input type="password" name="password" placeholder="password" required/>
			<input type="submit" value="Create Account"/>
                </form>
</body>
</html>


