<!DOCTYPE html>
<!--
API Test
Using the Guild Wars 2 API to get a grasp on how to get data from an external site.
-->
<?php require_once("functions.php"); ?>

<?php
    increment_site_viewcounter(get_file_name(__FILE__));
?>
<html>
    <link rel="shortcut icon" href="icons/favicon.ico" type="icons/x-icon" />
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>Testwebsite</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Style.css">
    </head>
    
    <body>
        <div id="header" class="section">
            <img alt="" class="img-circle" src="http://img09.deviantart.net/3c60/i/2017/188/e/f/jellyfish_by_bassrelic-d4gmjtv.jpg">
                 <p>A Name Goes Here!</p>
        </div>
        
        <?php 
        include "navTopBar.php";
        ?>

        <div class="layout">
            <?php 
            include "sidebar.php";
            ?>
            
            <div class="section1">
            <h1><span>Test of the GW2 API</span></h1>
            
            <?php
            $file = get_file_name(__FILE__);
            //echo '<input type="submit" class="button" name="'.$file.'" value="'.$file.'" />';
            // THIS APPROACH IS VULNERABLE TO INJECTIONS!
            echo '<button value="'.$file.'" class="upvote" aria-hidden="true">Upvote</button>';
            
            echo '<button value="'.$file.'" class="downvote" aria-hidden="true">Downvote</button>';
            ?>
            <script>$(document).ready(function(){
                $('.upvote').click(function(){
                    var clickBtnValue = $(this).val();
                    var ajaxurl = 'upvote_ajax.php',
                    data =  {'action': clickBtnValue};
                    $.post(ajaxurl, data, function () {
                    });
                });
            });</script>
            
            <script>$(document).ready(function(){
                $('.downvote').click(function(){
                    var clickBtnValue = $(this).val();
                    var ajaxurl = 'downvote_ajax.php',
                    data =  {'action': clickBtnValue};
                    $.post(ajaxurl, data, function () {
                    });
                });
            });</script>
            <h2>To get your account data, you must insert your API-Key. <br /> 
                You can get it from <a href="https://account.arena.net/login"> The official GW2 Website</a> <br />
                Just login, go to applications, create a new Key, copy-paste it into the form below and klick submit.
            </h2>
            <form action="GW2Api.php" method="post">
                <p>API-Key:<input type="text" name="Key"/></p>
                <p><input type="submit" name="submit" value="submit"</p>
            </form> 
            
            <!--https://wiki.guildwars2.com/wiki/API:2-->
            
            <?php 
            
            if(isset($_POST["Key"])&&($_POST["Key"]!=null)){
//                Filter User input for correct API Key Structure
                $key =filter_var($_POST["Key"], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/([A-F0-9]){8}-(([A-F0-9]){4}-){3}([A-F0-9]){20}-(([A-F0-9]){4}-){3}([A-F0-9]){12}/")));
//                Proceed if check did not fail
                if($key != false){
                $api="https://api.guildwars2.com/v2/account";
                $token="?access_token=";
                $url=$api.$token.$key;
                $json = file_get_contents($url);
                $data = json_decode($json);

                $i=0;
                foreach ($data as $value){
                    switch ($i) {
                        case 1:
                            echo "Account name: " , $value;
                            echo nl2br("\n");
                        break;
                        case 7:
                            echo "Acces to: " , implode(" ",$value);
                            echo nl2br("\n");
                        break;

                        default:
                        break;
                    }
                    $i++;
                }

                echo $data->{"name"};                 // get the name

//                var_dump($json);                    // dumps the whole object
                }
            }
            ?>
                
            </div>
        </div>
        
    </body>
</html>
