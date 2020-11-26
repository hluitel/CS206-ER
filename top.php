
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
    
 <?php
    
   
        print PHP_EOL . '<!--include Libraries-->' . PHP_EOL;
        
    
     print '<!-- begin including libraries -->';
        
        include 'lib/constants.php';

        include LIB_PATH . '/Connect-With-Database.php';

        print '<!-- libraries complete-->';

    
    ?>
        
    <!-- ############### body section #######################-->
    
    <?php
   
    
    print '<body id = "' . PATH_PARTS['filename'] . '">';
    
       // print '<body id="' . $PATH_PARTS['filename'] . '">';

    include('header.php');
    include('nav.php');

    print PHP_EOL;
   
