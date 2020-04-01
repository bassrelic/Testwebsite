

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

function parse_raw_text_to_html($path){

                // read raw text as array
                $raw = file($path) or die("Cannot read file");

                // retrieve first and second lines (title and author)
                $author = array_shift($raw);
                $date = array_shift($raw);

                // join remaining data into string
                $data = join('', $raw);

                // replace special characters with HTML entities
                // replace line breaks with <br />
                $html = nl2br(htmlspecialchars($data));

                // replace multiple spaces with single spaces
                $html = preg_replace('/\s\s+/', ' ', $html);

                // replace URLs with <a href...> elements
                $html = preg_replace('/\s(\w+:\/\/)(\S+)/', ' <a href="\\1\\2" target="_blank">\\1\\2</a>', $html);
                
                echo $author;
                echo $date;
                echo $html;
}
?>

<?php
function show_project_sidebar(){
    ?>
 <html>
    <div class="sidebar">
    <nav class="sidebarheader">
        Navigation
    </nav>

    <nav class="sidebarcontent">
            <?php
            $db = connect_db();
            $sql1 = 'SELECT shortname, sitename, score FROM pages WHERE pagetype=1 ORDER BY score DESC;';
            $res = mysqli_query($db ,$sql1) or die(mysql_error());
            $x=0;
            while (($data = mysqli_fetch_array($res)) && ($x < 6))
            {
                $x++;
                $shortname = $data[0];
                $sitename = $data[1];
                echo '<a href="'.$sitename.'">'.$shortname.'</a>';
            }
            ?>
            
        </nav>
    </div> 
</html>
<?php
}
?>

<?php
function show_sidebar(){
    ?>
 <html>
    <div class="sidebar">
    <nav class="sidebarheader">
        Navigation
    </nav>

    <nav class="sidebarcontent">
            <?php
            $db = connect_db();
            $sql1 = 'SELECT shortname, sitename, score FROM pages WHERE pagetype=0 ORDER BY score DESC;';
            $res = mysqli_query($db ,$sql1) or die(mysql_error());
            $x=0;
            while (($data = mysqli_fetch_array($res)) && ($x < 6))
            {
                $x++;
                $shortname = $data[0];
                $sitename = $data[1];
                echo '<a href="'.$sitename.'">'.$shortname.'</a>';
            }
            ?>
            
        </nav>
    </div> 
</html>
<?php
}
?>