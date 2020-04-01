<!--
Localized sidebar
-->

<?php require_once("functions.php"); ?>
<div class="sidebar">
    <nav class="sidebarheader">
        Sidebar
    </nav>

    <nav class="sidebarcontent">
        <?php
            $db = connect_db();
            $sql = 'SELECT shortname, sitename FROM pages;';
            $sql1 = 'SELECT shortname, sitename, score FROM pages ORDER BY score DESC;';
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