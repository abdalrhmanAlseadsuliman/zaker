<?php
include "../db/dbConn.php";
session_start();

if (
    isset($_SESSION['Email']) && !empty($_SESSION['Email']) &&
    isset($_SESSION['typeUsers']) && !empty($_SESSION['typeUsers'])
    && $_SESSION['typeUsers']==='admin'
    ) {
   
    $sql = "SELECT COUNT(UserId) AS totalSubscribers FROM users ";
    $result = mysqli_query($connection,$sql);
    if($result){
        $user = mysqli_fetch_assoc($result);
        echo json_encode($user);
    }
} 
?>