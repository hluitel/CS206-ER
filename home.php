<?php
include 'top.php';


?>
<main class='homemain'>
    <section class='homesection'>
        
        <h4>Create Players | Search Players | Play The Game</h4>
        
        <table class='tblHome'>
            <thead>
                <tr>
                    
                                  <th> <img src='./img/ronaldowall.jpg' class='small'</th>
                  
                    
                   
                    <th> <img src='./img/messi.jpg' class='small'</th>
                </tr>
            </thead>
            
            
            <tr>
                <td>Cristiano Ronaldo</td>
              
               <td>Lionel Messi</td>

                    
                
            </tr>
            
         
            
            
            
            <tr>
                <td>Age: 35</td>
                 
               <td>Age: 33</td>

                    
                
            </tr>
            
            
             <tr>
                <td>5 Ballon d'or</td>
               
               <td>6  Ballon d'or</td>
            </tr>
            
            
             <tr>
                <td>5 Champion Leagues</td>
                
               <td>4 Champion Leagues</td>
            </tr>
            
             <tr>
                <td>5 League Title</td>
                
               <td>10 League Titles</td>
            </tr>
            
           
            
            
        </table>
       
    </section>
    
    
                <aside class="sidebar">
                    <ul>
                        
                        <li class="score">
                            <h2>Ronaldo</h2>
                            <figure>
                                <img class='ronaldo' src="./img/ronaldo-jumping.jpg">
                                
                            </figure>

                        </li>
                        
                        <li class="score">
                            <h2>Messi</h2>
                            <figure>
                                <img class='ronaldo' src="./img/messi.jpg">
                                
                            </figure>

                         
                        </li>

                       

                    </ul>
                </aside>
    
    
    
</main>



        <tr>
            <th>UserName</th>
             <td><?php print($_SESSION['username']);?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php print($_SESSION['email']);?></td>

        </tr>
        <tr>
            <th>Points</th>
            <td><?php print($pointsRec);?></td>

        </tr>
        <tr>
            <th>Date Joined</th>
            <td><?php $_SESSION['dateJoined'] ?> </td>

        </tr>
