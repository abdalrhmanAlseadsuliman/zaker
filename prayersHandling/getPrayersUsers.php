<?php
session_start();
include "../db/dbConn.php";

if (
    isset($_SESSION['Email']) && isset($_SESSION['typeUsers']) &&
    !empty($_SESSION['Email']) && !empty($_SESSION['typeUsers']) &&
    ( $_SESSION['typeUsers'] == 'user' || $_SESSION['typeUsers'] == 'admin' )
) { 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $json = file_get_contents('php://input');
        // $data = json_decode($json, true);
        $postData = $_POST;
        if ( isset($postData['userId']) && !empty($postData['userId']) ) {
            
        $sql = "SELECT SUM(NumberPrayers) AS TotalPrayers FROM SchedulePrayers WHERE UserIdP = '$postData[userId]'";

        $result = mysqli_query($connection,$sql) ;
        if ($result) {
            $prayers = array();
            $row = mysqli_fetch_assoc($result);
            $prayers[] = $row;
    
            echo json_encode($prayers);
        }else {
            echo json_encode(array('error' => 'خطا في تنفيذ الاستعلام'));
        }

        }else{ 
            echo json_encode(array('error' => ' يرجى إنشاء حساب أو تسجيل الدخول لعرض صلواتك '));
        }
    }
}else{ 
    echo json_encode(array('error' => ' ليس لديك صلاحيات'));
}
    
?>