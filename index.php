<!DOCTYPE html>
<!--
Main page - testing what is possible and keeping a list of ideas with progress 
bar
-->
<?php require_once("config.php"); ?>
<?php require_once("functions.php"); ?>
<?php

    increment_site_viewcounter(get_file_name(__FILE__));
?>

<?php
//    Output all columns in one row
//    
//    $db = connect_db();    
//    $sql = 'SELECT * FROM users;';
//    $res = mysqli_query($db ,$sql);
//    
//    $data = mysqli_fetch_array($res);
//    
//    $anzahl = count ( $data )/2;
//        for ($x = 0; $x < $anzahl; $x++)
//    {
//        echo "$data[$x], ";
//    }
//    

//  Filename
$path_parts = pathinfo(__FILE__);
$filename = $path_parts['basename']; // seit PHP 5.2.0
?>  
<html>
    <link rel="shortcut icon" href="icons/favicon.ico" type="icons/x-icon" />
    <head>
        <title>s.hentges</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Style.css">
    </head>
    
    <body>
        <div id="header" class="section">
            <img alt="" class="img-circle" src="http://img09.deviantart.net/3c60/i/2017/188/e/f/jellyfish_by_bassrelic-d4gmjtv.jpg">
            <p><?php parse_raw_text_to_html("cont/sitename.txt") ?></p>
        </div>
       
        <?php 
        include "navTopBar.php";
        ?>
        

        <div class = "layout">
            <?php 
                show_sidebar();
            ?>
            <div class="section1">

                <h1><span>Welcome</span></h1>
                <?php
                    parse_raw_text_to_html("cont/welcome.txt")
                ?>
            </div>
        </div>
        <div class = "layout">
            <div class="section2">
            </div>    
        </div>    
        
        
    </body>
</html>
