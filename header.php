 <?php
 session_start();
 ?>
  <header id="topthepage">
    
    <ul class='headerNav'>
        <li><a href="save.php"><?php print($_SESSION['username']); ?></a></li><li><a href="logout.php">Logout</a></li>        
      </ul>
      
    
       <figure id="logo">
           <img class="banner" src="./img/fifa.svg" alt="logo banner">
           
        
        </figure> 
</header>

    



