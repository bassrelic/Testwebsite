<!DOCTYPE html>
<?php 
    require_once("config.php");
    require_once("functions.php");

    //Filter for anything other than an integer
    $valid = filter_input ( INPUT_GET, 
                      'id', 
                      FILTER_VALIDATE_INT,
                      array('options'=>array('min_range' => 1)));
    //
    if(!$valid){
        $id=0;
    }else{
        $id=$valid;
    }
        
    $id=$_GET["id"];
    $db = connect_db();
    $sql1 = 'SELECT sitename, shortname, date, slug FROM projects WHERE id='.$id.';';
    $res = mysqli_query($db ,$sql1) or die(mysql_error());
    $data = mysqli_fetch_array($res);
    $sitename = $data[0];
    $shortname = $data[1];
    $slug = $data[3];
    increment_project_viewcounter($id   );
    
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
                 <p><?php echo$shortname; ?></p>
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
                    parse_raw_text_to_html("cont/".$slug.".txt")
                ?>
            </div>
        </div>
        <div class = "layout">
            <div class="section2">
            </div>    
        </div>    
        
        
    </body>
</html>
