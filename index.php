<?php
include 'top.php';


?>



<body id ="index">
    
    <p>Hello</p>
    
    

   
  <?php   
  
  
  
session_start();

print($_SESSION['username']);
print($_SESSION['key']);


  /**      


             $sql = "select * from tblPlayers";
            $records = $thisDatabaseReader->select($sql, '');

            foreach ($records as $record){
                print($record['fldFirstName']);
                
                
                
            }
            
     */        
     ?>        



        <?php include 'footer.php';?>
         </body>
</html>
         