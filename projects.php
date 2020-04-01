<!DOCTYPE html>
<?php require_once("config.php"); ?>
<?php require_once("functions.php"); ?>
<?php

    increment_site_viewcounter(get_file_name(__FILE__));
?>

<?php
//  Filename
$path_parts = pathinfo(__FILE__);
$filename = $path_parts['basename']; // seit PHP 5.2.0
?>  

<html>
    <link rel="shortcut icon" href="icons/favicon.ico" type="icons/x-icon" />
    <head>
        <title>Projects</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Style.css">
    </head>
    
    <body>
        <div id="header" class="section">
            <img alt="" class="img-circle" src="http://img09.deviantart.net/3c60/i/2017/188/e/f/jellyfish_by_bassrelic-d4gmjtv.jpg">
                 <p>Projects</p>
        </div>
       
        <?php 
        include "navTopBar.php";
        ?>
        

        <div class = "layout">     
        <?php
            show_project_sidebar();
        ?>
            <div class="section1">

                <h1><span>Projects</span></h1>
                <?php
                    parse_raw_text_to_html("cont/projects.txt")
                ?>
            </div>
        </div>
        <div class = "layout">
            <div class="section2">
            </div>    
        </div>    
        
        
    </body>
</html>
