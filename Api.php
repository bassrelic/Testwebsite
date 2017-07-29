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
        ?>

        <div class="layout">
            <?php 
            include "sidebar.php";
            ?>
            
            <div class="section">
            <h1><span>Test of the GW2 API</span></h1>
            <h2>To get your account data, you must insert your API-Key. <br /> 
                You can get it from <a href="https://account.arena.net/login"> The official GW2 Website</a> <br />
                Just login, go to applications, create a new Key, copy-paste it into the form below and klick submit.
            </h2>
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
                        echo "Acces to: " , $value;
                        echo nl2br("\n");
                    break;

                    default:
                    break;
                }
                $i++;
            }
            
//            echo $data->{name};                 // get name
      
//            var_dump($json);                    // dumps the whole object
            ?>
                
            </div>
        </div>
        
    </body>
</html>
