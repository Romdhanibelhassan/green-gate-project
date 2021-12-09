<?php
session_start();
session_destroy();
echo 'Vous êtes déconnecté. <a href="./login.php">Se connecter ?</a>';
header('Location:login.php');
?>