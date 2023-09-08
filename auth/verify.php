<?php
session_start();
include "../db/dbConn.php";

function generateRandomCode($length) {
    
    $bytes = random_bytes($length);
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $index = ord($bytes[$i]) % strlen($characters);
        $code .= $characters[$index];
    }

    return $code;
}


if (isset($_POST['email']) && isset($_POST['vCode'])) {
    $email = $_POST['email'];
    $vCode = $_POST['vCode'];

    $sql = "SELECT * FROM users WHERE Email = '$email' "; 
    $result = $connection->query($sql);
    // var_dump($result->fetch_assoc());
    if ($result) {

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // echo $row['Email']. "<br>" . $row['VerificationId'] . "<br>";
            $fetch_Email = $row['Email'];
            $status = $row['Status'];
            // $userId = $row['UserId'];
            $oldvCode = $row['VerificationId'];
            // $vStatus = (int)$row['VerificationStatus'];
            // if ($oldvCode != $vCode)
            if ( $row['VerificationStatus'] == 0 && $oldvCode == $vCode ) {
                $newvCode= generateRandomCode(10);
                $update = "UPDATE users SET VerificationStatus='1', VerificationId = '$newvCode' WHERE Email = '$fetch_Email'";

                if ($connection->query($update) === TRUE) {
                    
                    setcookie('Email', $fetch_Email, time() + (86400 * 30), '/');
                    setcookie('typeUsers',$status, time() + (86400 * 30), '/');
                    // setcookie('userId', $user['UserId'], time() + (86400 * 30), '/');
                    $_SESSION['Email'] = $fetch_Email;
                    $_SESSION['typeUsers'] = $status;
                    // $_SESSION['userId'] = $user['UserId'];

                    $response["success"] = "تم التحقق بنجاح يمكنك إدخال الصلوات الآن";
                   
                } 
                else {
                    $response["error"] = " خطا في الاستعلام ";
                }
            }
             else {
                $response["error"] = " الرابط لم يعد صالح للاستخدام ";
               
            }
        }else {
            $response["error"] = " الايميل غير موجود ";
        }
    }
} else {
    
    $response["error"] = " البيانات مفقودة";
   
}

echo json_encode($response);

