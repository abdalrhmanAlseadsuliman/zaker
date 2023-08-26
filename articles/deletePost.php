<?php
include "../db/dbConn.php";
session_start();
$response = [];
if  ( 
        isset($_SESSION['Email']) && isset($_SESSION['typeUsers']) &&
        !empty($_SESSION['Email']) && !empty($_SESSION['typeUsers']) &&
        $_SESSION['typeUsers'] === 'admin'
    )
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
            $postData = $data;
            if ( isset($postData["ArticleId"]) && !empty($postData["ArticleId"])){
               
                $sql = "DELETE FROM articles WHERE ArticleId = '$postData[ArticleId]'";
                $result = mysqli_query($connection,$sql) ;
                if ($result) {
                    $response["message"] = "تم الحذف بنجاح";
                }
                else{
                    $response["message"] = " خطأ اثناء الحذف ";
                }
            } else {
                $response["message"] = " خطأ في ارسال بيانات الحذف ";
            }         
        }
    }else {
        $response["message"] = " خطأ في ارسال بيانات الحذف ";
    }

    echo json_encode($response);
?>