<?php
    $message = null;
    if(isset($_GET["message"])){
        $message = $_GET["message"];
    }
    echo $message;
?>