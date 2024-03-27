<?php
if ($_SERVER['REQUEST_URI'] === '/hidden/') {
    include('../hidden.html');
    exit; 
} else {
    header("Location: /fileupload.php");
    exit;
}
?>
