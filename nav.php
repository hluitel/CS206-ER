<!-- ######################     Main Navigation   ########################## -->
<nav>
    <ul>
        <?php
        // This sets a class for current page so you can style it differently
        
        
        print '<li class="';
        if ($PATH_PARTS['filename'] == "home") {
            print ' activePage ';
        }
        print '">';
        print '<a href="home.php">Home</a>';
        print '</li>';

        print '<li class="';
        if ($PATH_PARTS['filename'] == "squad") {
            print ' activePage ';
        }
        print '">';
        print '<a href="squad.php">Squad Builder</a>';
        print '</li>';
        
        print '<li class="';
        if ($PATH_PARTS['filename'] == "playersCatalog") {
            print ' activePage ';
        }
        print '">';
        print '<a href="playersCatalog.php">Players Catalog</a>';
        print '</li>';
        
        print '<li class="';
        if ($PATH_PARTS['filename'] == "playerPack") {
            print ' activePage ';
        }
        print '">';
        print '<a href="playerPack.php">Player Pack</a>';
        print '</li>';
        


        
        
       
        
        ?>
    </ul>
</nav>
<!-- #################### Ends Main Navigation    ########################## -->

