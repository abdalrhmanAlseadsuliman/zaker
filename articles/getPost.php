<?php
session_start();
include "../db/dbConn.php";
if  ( 
        isset($_SESSION['Email']) && isset($_SESSION['typeUsers']) &&
        !empty($_SESSION['Email']) && !empty($_SESSION['typeUsers']) &&
        $_SESSION['typeUsers'] === 'admin'
    )
    {
        $sql = "SELECT articles.*, CONCAT(users.FirstName, ' ', users.LastName) AS publisher_name
        FROM articles
        JOIN users ON articles.UserIdArticle = users.UserId";

        $result = mysqli_query($connection,$sql) ;
        if ($result) {
            $articles = array();
        
            while ($row = mysqli_fetch_assoc($result)) {
                $articles[] = $row;
            }
            
            echo json_encode($articles);
        } else {
            echo json_encode(array('error' => 'خطا في تنفيذ الاستعلام'));
        }

    } else{
        echo json_encode(array('error' => 'ليس لديك صلاحيات في الوصول'));
    } 

?>