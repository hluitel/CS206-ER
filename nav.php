<!-- ######################     Main Navigation   ########################## -->
<nav>
    <ol>
        <?php
        // This sets a class for current page so you can style it differently
        
        print '<li ';
        if (PATH_PARTS['filename'] == 'index') {
            print ' class="activePage" ';
        }
        print '><a href="index.php">Home</a></li>';
       
        print '<li ';
        if (PATH_PARTS['filename'] == 'squad') {
            print ' class="activePage" ';
        }
        print '><a href="squad.php">Squad Builder</a></li>';
       
   
        
        print '<li ';
        
         print '<li ';
        if (PATH_PARTS['filename'] == 'Login') {
            print ' class="activePage" ';
        }
        print '><a href="login.php">Login</a></li>';
       
   
        
        print '<li ';
        
        if (PATH_PARTS['filename'] == 'playerPack') {
            print ' class="activePage" ';
        }
        print '><a href="playerPack.php">playerPack</a></li>';
        
        print '<li ';
        
         print '<li ';
        
        if (PATH_PARTS['filename'] == 'PlayersList') {
            print ' class="activePage" ';
        }
        print '><a href="playersCatalog.php">playerPack</a></li>';
        
        print '<li ';
        
        ?>
    </ol>
</nav>
<!-- #################### Ends Main Navigation    ########################## -->

