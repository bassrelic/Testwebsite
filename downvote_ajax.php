<?php require_once("functions.php"); ?>
<?php
    if (isset($_POST['action'])) {
        decrement_site_score($_POST['action']);
    }
?>