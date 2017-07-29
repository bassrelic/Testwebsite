<!DOCTYPE html>
<!--
Main page - testing what is possible and keeping a list of ideas with progress 
bar
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
        

        <div class = "layout">
            <?php 
            include "Sidebar.php";
            ?>
            <div class="section">

                <h1><span>Let's test what we can do here.</span></h1>
                <ol>
                    <li>Glass - Bar<br />
                        <progress id="task-progress" max="100" value="100"></progress>
                    </li>
                    <li>Floating list with voting System<br />
                        <progress id="task-progress" max="100" value="11">11 %</progress>
                    </li>
                    <li>Include Text with PHP / MySql<br />
                        <progress id="task-progress" max="100" value="22"></progress>
                    </li>
                    <li>Sidebar used for navigation<br />
                        <progress id="task-progress" max="100" value="0"></progress>
                    </li>
                    <li>Use a Api to get data (GW2 [?])<br />
                        <progress id="task-progress" max="100" value="0"></progress>
                    </li>
                </ol>
            </div>
        
        </div>
        
        <div class="section">
            asdagsgs
        </div>    
        
    </body>
</html>
