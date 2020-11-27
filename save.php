

<?php
include 'top.php';
session_start();
$username1 = $_SESSION['key'];
 $checkUserTwo = 'select * from tblUserRewards where pfkUserID = ?';


                
                #$thisDatabaseReader->testSecurityQuery($checkUser);

                if($thisDatabaseReader->querySecurityOK($checkUserTwo)){
                    $ready = $thisDatabaseReader->sanitizeQuery($checkUserTwo);
                    $validateUserReward1 = $thisDatabaseReader->select($ready, array($username1));
                
                
                }
  $pointsRec = $validateUserReward1[0]['fldPoints'];        
?>




<section class="card">
  <h1><?php print($_SESSION['username']); ?></h1>
  
  <p class="title"><?php print($_SESSION['email']);?> </p>
  <p class="title"><?php print($pointsRec);?></p>
  <p class="title"><?php $_SESSION['dateJoined'] ?></p>
</section>
