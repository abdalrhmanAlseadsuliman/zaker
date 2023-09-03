<?php
include "../db/dbConn.php";

        $sql = "SELECT SUM(NumberPrayers) AS TotalPrayers FROM SchedulePrayers";

        $result = mysqli_query($connection,$sql) ;
        if ($result) {
            $prayers = array();
        
            while ($row = mysqli_fetch_assoc($result)) {
                $prayers[] = $row;
            }
            // var_dump($prayers);
            echo json_encode($prayers);
        } else {
            echo json_encode(array('error' => 'خطا في تنفيذ الاستعلام'));
        }
        // echo json_encode(array('error' => 'ليس لديك صلاحيات في الوصول'));

    
    
?>