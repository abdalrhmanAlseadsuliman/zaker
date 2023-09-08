
<?php
include "../db/dbConn.php";

session_start();
if (
    isset($_SESSION['Email']) && !empty($_SESSION['Email']) &&
    isset($_SESSION['typeUsers']) && !empty($_SESSION['typeUsers'])
    ) {
    $userEmail = $_SESSION['Email'];
    $typeUsers = $_SESSION['typeUsers'];
    $sql = "SELECT UserId FROM users WHERE Email = '$userEmail' AND Status ='$typeUsers' ";
    $result = mysqli_query($connection,$sql);
    if($result->num_rows == 1){
        $user = mysqli_fetch_assoc($result);
        echo json_encode($user);
    }else{
        echo json_encode(['userError' => null]);
    }
} else {
    echo json_encode(['userError' => " يرجى تسجيل الدخول أولاً "]);
}
?>
