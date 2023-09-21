<?php
include "../auth/functionRegisteration.php";

// $month = ['محرم','صفر','ربيع1','ربيع2','جمادى1','جمادى2','رجب','شعبان','رمضان','شوال','ذي القعدة','ذي الحجة' ];
// for ($i=0; $i < 12; $i++) { 

// for ($j=1; $j < 30 ; $j++) { 
//     $postData['prayerCount'] = random_int(1,10)*1000;
//     if ($j < 10){
//         $day = "0" . $j;
//     }else
//     {
//         $day = $j;
//     }
//     if ($i < 9){
//         $mon = "0" . ($i+1);
//     }else
//     {
//         $mon = ($i+1);
//     }
//     $postData['hijriDate'] = $day . "-" . $mon ."-1445-" . $month[$i] ;
//     $sql = "INSERT INTO SchedulePrayers (NumberPrayers,Date,UserIdP)
//                     VALUES ('$postData[prayerCount]', '$postData[hijriDate]' ,'4' )";
//     if(mysqli_query($connection,$sql)){
//         echo "تم ";
//     }

// }
// }

if (
    isset($_SESSION['Email']) && isset($_SESSION['typeUsers']) &&
    !empty($_SESSION['Email']) && !empty($_SESSION['typeUsers']) &&
    ($_SESSION['typeUsers'] === 'admin' ||  $_SESSION['typeUsers'] === 'user')
) {


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $postData = $_POST;
        // var_dump($postData);
        $requiredFields = [
            'prayerCount' => 'عدد الصلوات',
            'userId' => 'رقم المستخدم',
            'hijriDate' => 'التاريخ'
        ];
        if (
            isValidData($requiredFields, $postData, $response)
        ) {
            $postData['userId']      = (int)$postData['userId'];
            $postData['prayerCount'] = (int)$postData['prayerCount'];
            if ($postData['prayerCount'] <= 1000000) {

                // $currentDate = date("Y-m-d");
                $postData['hijriDate'] = trim($postData['hijriDate']);
                $sql = "SELECT NumberPrayers FROM SchedulePrayers WHERE Date = '$postData[hijriDate]' AND UserIdP= '$postData[userId]'";
                if (mysqli_num_rows(mysqli_query($connection, $sql)) == 1) {
                    $sql = "UPDATE SchedulePrayers SET NumberPrayers = (NumberPrayers + '$postData[prayerCount]') WHERE  Date = '$postData[hijriDate]' AND UserIdP = '$postData[userId]'";
                    if (mysqli_query($connection, $sql)) {
                        $response["insertPrayer"] = "تم إضافة عدد صلواتك بنجاح";
                    } else {
                        $response["insertPrayer"] = " فشل إدخال عدد صلواتك  ";
                    }
                } else {
                    $sql = "INSERT INTO SchedulePrayers (NumberPrayers,Date,UserIdP)
                    VALUES ('$postData[prayerCount]', '$postData[hijriDate]' ,'$postData[userId]' )";
                    if (mysqli_query($connection, $sql)) {
                        $response["insertPrayer"] = "تم إدخال عدد صلواتك بنجاح";
                    } else {
                        $response["insertPrayer"] = " فشل إدخال عدد صلواتك  ";
                    }
                }
            } else {
                $response["insertPrayer"] = "خطأ في عدد الصلوات";
            }
        } else {
            $response["insertPrayer"] = " فشل إدخال عدد صلواتك  ";
        }
    }
    echo json_encode($response);
}
