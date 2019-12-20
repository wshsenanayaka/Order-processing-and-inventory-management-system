<!-- check  the login user correct -->
<?php
    session_start();
    require '../include/config.php';
    $role= $_SESSION['user_role'];
    $roleID= $_SESSION['user_role_id'];
    if(!isset($_SESSION['user_role'])){
    header('Location: ../index.php');
    }
?>
