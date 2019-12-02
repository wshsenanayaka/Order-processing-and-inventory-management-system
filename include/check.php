<!-- check  the login user correct -->
<?php
    session_start();
    $user= $_SESSION['username'];
    if(!isset($_SESSION['username'])){
    header('Location: index.php');
    }
?>
