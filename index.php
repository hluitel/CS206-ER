<?php
        print PHP_EOL . '<!--include Libraries-->' . PHP_EOL;  
     print '<!-- begin including libraries -->';     
        include 'lib/constants.php';
        include LIB_PATH . '/Connect-With-Database.php';
        print '<!-- libraries complete-->';

    
    
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
      
}

include 'functions.php';

$userName = "";
$passWord = "";

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
            
            
            
        if(is_array($validateUser)){
            $test = $validateUser[0]['pmkUserID'];  
            $emailStore = $validateUser[0]['fldEmail'];
            $DateJoined = $validateUser[0]['fldDateJoin'];
        }    
        try{
            if(password_verify($passWord, $validateUser[0]['fldPassword'])) {
                $_SESSION["username"] = $userName;
                
                $_SESSION["key"] = $test;
                
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $emailStore;
                $_SESSION["dateJoined"] = $DateJoined;
                
                $checkUserTwo = 'select * from tblUserRewards where pfkUserID = ?';


                
                #$thisDatabaseReader->testSecurityQuery($checkUser);

                if($thisDatabaseReader->querySecurityOK($checkUserTwo)){
                    $ready = $thisDatabaseReader->sanitizeQuery($checkUserTwo);
                    $validateUserReward = $thisDatabaseReader->select($ready, array($test));
                
                
                }
                
                
                if(is_array($validateUserReward)) {
                    $rewardTesting = $validateUserReward[0]['fldTime'];
                    $rewardTesting = strtotime($rewardTesting);                   
                }
                
                print($validateUserReward[0]['fldTime']);
                print("<p>Time Recorded</p>");
                print($rewardTesting);
                
                $timeNow = strtotime("now");
                print("<p>Time Now</p>");
                print($timeNow);
                
                
                $diff = $timeNow - $rewardTesting;
                print("<p>Differnce</p>");

                print($diff);
                  $pointRecord = $validateUserReward[0]['fldPoints'];
                  $_SESSION["points"] = $pointRecord;
                    
                
                if($diff > 86400) {
                    print("got here");
                    $points = $validateUserReward[0]['fldPoints'] + 100;
                    print("points");
                    print($points);
                    

                    //$checkUserThree = 'UPDATE tblUserRewards(pfkUserID,fldPoints) values(?,?)';
                     //$checkUserThree = "UPDATE tblUserRewards SET fldPoints = ? where pfkUserID = $test";
                       $checkUserThree = "UPDATE tblUserRewards SET fldPoints = ?, fldTime =  current_timestamp where pfkUserID = ?";


                    //$timeRecord = 
                    
                    $arrTwo = array($points,$test);
                    
                    $thisDatabaseReader->testSecurityQuery($checkUserThree,1,0,0,0,0);
                    if($thisDatabaseWriter->querySecurityOK($checkUserThree,1,0,0,0,0)){
                    $ready = $thisDatabaseWriter->sanitizeQuery($checkUserThree);
                    $validateUserRewardOne = $thisDatabaseWriter->update($ready, $arrTwo);
                
                
                }
                
                if(is_array($validateUserRewardOne)){
                    //print($validateUserReward[0]['fldPoints']);
                    $pointRecord = $validateUserReward[0]['fldPoints'];
                    $_SESSION["points"] = $pointRecord;
                    
                }
                
                    

                    
                    
                }
                
                
                
                    
                //print($_SESSION["username"]);
                header("Location: home.php");
                die;    
            }
            else{
                print("<p>Incorrect Passoword</p>");
                $userData = $userName;
                $attempt = 1;
            }


            
           
        }catch(Exception $ex) {
             print("<p>Incorrect Passoword</p>");
            

        }
                        
            
            
            
            
        }
        
        
       
        
        //if($validateUser[0] == $providedInfo[0] && $validateUser[1] == $providedInfo[1]) {
      
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
    
<body id="index">
<form method='POST' action='' class="login">
    <fieldset class="loginf">
			<p class="form-input">
                            <input type="text" name="username" value = "<?php print($userName); ?>" placeholder="Enter the User Name" required/>	
			<p class="form-input">
                            <input type="password" name="password" placeholder="password" required/>
                            
                        <input type="submit" type="submit" value="LOGIN" class="btn-login"/>

                     
                        <h4 class="loginh">Don't Have An Account?</h4><a class="logina" href="createAccount.php">Create Account</a>
    
    
     
             
    </fieldset>
                </form>
</body>
</html>

