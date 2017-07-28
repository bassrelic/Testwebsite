<!DOCTYPE html>
<!--
API Test
Using the Guild Wars 2 API to get a grasp on how to get data from an external site.
-->
<html>
    <link rel="shortcut icon" href="icons/favicon.ico" type="icons/x-icon" />
    <head>
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
        include "Header.php";
        include "Sidebar.php";
        ?>

        <div class="section">
            <form action="api.php" method="post">
                <p>API-Key:<input type="text" name="Key"/></p>
                <p><input type="submit" name="submit" value="submit"</p>
            </form> 
            
            <?php 
            $key=$_POST['Key'];
            if(isset($key)&&($key!=null)){
//                echo "Key is " .$key;
            }
            $api="https://api.guildwars2.com/v2/account";
            $token="?access_token=";
            $url=$api.$token.$key;
//            echo "".$url;
            $json = file_get_contents($url);
            $data = json_decode($json);
            echo $data->{name};                 // get name
            echo $data->{output_item_id};
            echo $data->{output_item_count};
            echo $data->{min_rating};
            echo $data->{time_to_craft_ms};
            echo $data->{disciplines}[1];       // get element of array
            
//            
//            echo $json;
            var_dump($json);
            ?>
                
        </div>
    </body>
</html>
