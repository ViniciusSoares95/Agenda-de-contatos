<?php
if(!isset($_SESSION)){
    session_start();
}
if(empty($_SESSION['ativo'])) {
    header("Location:index.php");
}



?>