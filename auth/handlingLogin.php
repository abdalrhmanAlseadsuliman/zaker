<?php
include "functionRegisteration.php";

// var_dump($_SESSION);
// تحقق من إرسال نموذج تسجيل الدخول

// if(isset ($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers']) && $_COOKIE['typeUsers'] == 'mainte' ){
//     header("Location:../admins/dashboardMainte.php");

//   }elseif(isset ($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers']) && $_COOKIE['typeUsers'] == 'admin' ){
//     header("Location:../admins/dashboard_admin.php");
//   }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $postData = $data;
    if (isset($postData['Email']) && isset($postData['Password']) && !empty($postData['Password']) && !empty($postData['Email'])) {

        foreach ($postData as $key => $value) {
            $postData[$key] = sanitizeInput($value);
        }
        $email = $postData['Email'];
        $password = $postData['Password'];
        $response = "";
        echo $email . " " . $password;
        $sql = "SELECT * FROM users WHERE Email =  '$email'";

        // echo $email . " " . $password;
        $result = mysqli_query($connection, $sql);
        // إنشاء كوكيز لتخزين بعض البيانات
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['Password'])) {
                if (!empty($_POST['Remember']) && isset($_POST['Remember'])) {
                    setcookie('email', $email, time() + (86400 * 30), '/');
                    // setcookie('password', $password, time() + (86400 * 30), '/');
                    // setcookie('userId', $user['UserID'], time() + (86400 * 30), '/');
                    $_SESSION['email'] = $email;
                    // $_SESSION['password'] = $password;
                    // $_SESSION['userId'] = $user['UserID'];
                }
                $response = "تم تسجيل الدخول بنجاح";
            } else {
                $response = "كلمة المرور غير صحيحة";
            }
        } else {
            $response = "  الايميل غير موجود يرجى تاكد من الايميل او إنشاء حساب جديد";
        }
    } else {
        $response = " يرجى عدم ترك الحقول فارغة ";
    }
    echo ($response);
}


?>