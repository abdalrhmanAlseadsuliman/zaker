<?php
include "../db/dbConn.php";
session_start();
if  ( 
        isset($_SESSION['Email']) && isset($_SESSION['typeUsers']) &&
        !empty($_SESSION['Email']) && !empty($_SESSION['typeUsers']) &&
        $_SESSION['typeUsers'] === 'admin'
    )
    {
        $sql = "SELECT SchedulePrayers.NumberPrayers,SchedulePrayers.Date, CONCAT(users.FirstName, ' ', users.LastName) AS full_name, users.Nationality, users.Age,users.Gender, users.Email
        FROM SchedulePrayers
        JOIN users ON SchedulePrayers.UserIdP = users.UserId";

        $result = mysqli_query($connection,$sql) ;
        if ($result) {
            $prayers = array();
        
            while ($row = mysqli_fetch_assoc($result)) {
                $prayers[] = $row;
            }
            
            echo json_encode($prayers);
        } else {
            echo json_encode(array('error' => 'خطا في تنفيذ الاستعلام'));
        }
        // echo json_encode(array('error' => 'ليس لديك صلاحيات في الوصول'));

    } elseif (
        isset($_SESSION['Email']) && isset($_SESSION['typeUsers']) &&
        !empty($_SESSION['Email']) && !empty($_SESSION['typeUsers']) &&
        $_SESSION['typeUsers'] === 'user'
    ) { 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // $json = file_get_contents('php://input');
            // $data = json_decode($json, true);
            $postData = $_POST;
            if ( isset($postData['userId']) && !empty($postData['userId']) ) {
               
            $sql = "SELECT NumberPrayers, Date 
            FROM SchedulePrayers WHERE UserIdP = '$postData[userId]'";
    
            $result = mysqli_query($connection,$sql) ;
            if ($result) {
                $prayers = array();
            
                while ($row = mysqli_fetch_assoc($result)) {
                    $prayers[] = $row;
                }
                
                echo json_encode($prayers);
            }

            }
        }
       
    } 

?>