

<?php require_once("config.php"); ?>
<?php

function connect_db(){
    global $database_host;
    global $database_name;
    global $database_user;
    global $database_pass;
    $db = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
    if($db===FALSE){
        die("Keine Verbindung zu DB");
    }
    return $db;
}

function get_file_name($path){
    $path_parts = pathinfo($path);
$filename = $path_parts['basename']; // seit PHP 5.2.0
    return $filename;
}

function increment_site_score($filename){

    $db = connect_db();    
    $sql = "UPDATE pages
            SET score = score + 1
            WHERE sitename='$filename';";
    
    $res = mysqli_query($db ,$sql);
    return $res;
}

function decrement_site_score($filename){

    $db = connect_db();    
    $sql = "UPDATE pages
            SET score = score - 1
            WHERE sitename='$filename';";
    
    $res = mysqli_query($db ,$sql);
    return $res;
}

function increment_site_viewcounter($filename){

    $db = connect_db();    
    $sql = "UPDATE pages
            SET viewcounter = viewcounter + 1
            WHERE sitename='$filename';";
    
    $res = mysqli_query($db ,$sql);
    return $res;
}