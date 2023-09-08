<?php
session_start();
include "../db/dbConn.php";

if (
    isset($_SESSION['Email']) && !empty($_SESSION['Email']) &&
    isset($_SESSION['typeUsers']) && !empty($_SESSION['typeUsers'])
    && $_SESSION['typeUsers']==='admin'
    ) {
   
    $sql = "SELECT COUNT(ArticleId) AS totalArticles FROM articles ";
    $result = mysqli_query($connection,$sql);
    if($result){
        $user = mysqli_fetch_assoc($result);
        echo json_encode($user);
    }
} 
?>