<?php require_once("functions.php"); ?>
<?php
    if (isset($_POST['action'])) {
        increment_site_score($_POST['action']);
    }
?>