<?php
include "../auth/functionRegisteration.php" ;

if  ( 
    isset($_SESSION['Email']) && isset($_SESSION['typeUsers']) &&
    !empty($_SESSION['Email']) && !empty($_SESSION['typeUsers']) &&
    ( $_SESSION['typeUsers'] === 'admin' ||  $_SESSION['typeUsers'] === 'user' )
){
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $postData = $_POST;
        // var_dump($postData);
        $requiredFields = [
            'prayerCount' => 'عدد الصلوات',
            'userId' => 'رقم المستخدم',
            'hijriDate' => 'التاريخ'
        ];
        if (
                isValidData($requiredFields,$postData,$response)
            ) {
                $postData['userId']      = (int)$postData['userId'];
                $postData['prayerCount'] = (int)$postData['prayerCount'];
                // $currentDate = date("Y-m-d");
                $postData['hijriDate'] = trim($postData['hijriDate']);
                $sql = "SELECT NumberPrayers FROM SchedulePrayers WHERE Date = '$postData[hijriDate]' AND UserIdP= '$postData[userId]'";
                
                if ( mysqli_num_rows(mysqli_query($connection,$sql))==1){                        
                    $sql = "UPDATE SchedulePrayers SET NumberPrayers = (NumberPrayers + '$postData[prayerCount]') WHERE  Date = '$postData[hijriDate]' AND UserIdP = '$postData[userId]'";
                    if (mysqli_query($connection,$sql)) {
                        $response["insertArticle"] = " تم إضافة عدد صلواتك بنجاح ";
                        }else {
                        $response["insertArticle"] = " فشل إدخال عدد صلواتك  ";
                        }
                }else{
                    $sql = "INSERT INTO SchedulePrayers (NumberPrayers,Date,UserIdP)
                    VALUES ('$postData[prayerCount]', '$postData[hijriDate]' ,'$postData[userId]' )";
                    if (mysqli_query($connection,$sql)) {
                    $response["insertArticle"] = " تم إدخال عدد صلواتك بنجاح ";
                    }else {
                    $response["insertArticle"] = " فشل إدخال عدد صلواتك  ";
                    }
                }
                

        }else{
            $response["insertArticle"] = " فشل إدخال عدد صلواتك  ";
        }
    }
    echo json_encode($response);
}
?>