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
/*
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
                $aggregatedResults = array();
            
                while ($row = mysqli_fetch_assoc($result)) {
                    $email = $row['Email'];
                    $parts = explode("-", $row['Date']);
                    $month = $parts[3];
                    $numberPrayers = $row['NumberPrayers'];
                
                    if (!isset($aggregatedResults[$email])) {
                      $aggregatedResults[$email] = array(
                        'fullName' => $row['full_name'],
                        'age' => $row['Age'],
                        'nationality' => $row['Nationality'],
                        'gender' => $row['Gender'],
                        'monthlyData' => array()
                      );
                    }
                
                    if (!isset($aggregatedResults[$email]['monthlyData'][$month])) {
                      $aggregatedResults[$email]['monthlyData'][$month] = 0;
                    }
                
                    $aggregatedResults[$email]['monthlyData'][$month] += $numberPrayers;
                  }
                
                echo json_encode($aggregatedResults);
            }else {
                    echo json_encode(array('error' => 'خطا في تنفيذ الاستعلام'));
            }
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
           
    
    
        /*
        foreach ($aggregatedResults as $email => $userData) {
        echo "البريد الإلكتروني: $email<br>";
        echo "الاسم الكامل: " . $userData['fullName'] . "<br>";
        echo "العمر: " . $userData['age'] . "<br>";
        echo "الجنسية: " . $userData['nationality'] . "<br>";
        echo "الجنس: " . $userData['gender'] . "<br>";
    
        foreach ($userData['monthlyData'] as $month => $totalPrayers) {
          echo "شهر $month: $totalPrayers صلاة<br>";
        }
    
        echo "<br>";
      }
    }
        */
    
?>