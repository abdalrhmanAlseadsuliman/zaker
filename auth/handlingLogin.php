<?php
include "functionRegisteration.php";

// var_dump($_SESSION);
// تحقق من إرسال نموذج تسجيل الدخول

$response = [];

if(
    isset($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers']) && $_COOKIE['typeUsers'] == 'user' 
    && isset($_COOKIE['Email']) && !empty($_COOKIE['Email'])
    ){
   
    $response["link"] = "index.php";

  }elseif(isset ($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers']) && $_COOKIE['typeUsers'] == 'admin' ){
    $response["link"] = "index.php";

  }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $postData = $data;
    // $postData = $_POST;
    // var_dump($postData);
    
    if (isset($postData['Email']) && isset($postData['Password']) && !empty($postData['Password']) && !empty($postData['Email'])) {

        foreach ($postData as $key => $value) {
            $postData[$key] = sanitizeInput($value);
        }
        $email = $postData['Email'];
        $password = $postData['Password'];
        // echo $email . " " . $password;
        $sql = "SELECT * FROM users WHERE Email =  '$email'";

        // echo $email . " " . $password;
        $result = mysqli_query($connection, $sql);
        // إنشاء كوكيز لتخزين بعض البيانات
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if($user['VerificationStatus']== 1){

            if (password_verify($password, $user['Password'])) {
                if ( !empty($postData['Remember']) && isset($postData['Remember'])) {
                    setcookie('Email', $email, time() + (86400 * 30), '/');
                    setcookie('typeUsers', $user["Status"], time() + (86400 * 30), '/');
                }
                if ($user["Status"] == "admin" ) {
                    $response["message"] = "تم تسجيل الدخول بنجاح";
                    $response["link"] = "index.php";
                    $_SESSION['Email'] = $email;
                    $_SESSION['typeUsers'] = $user["Status"];
                }
                elseif($user["Status"] == "user"){
                    $response["message"] = "تم تسجيل الدخول بنجاح";
                    $response["link"] = "index.php";
                    $_SESSION['Email'] = $email;
                    $_SESSION['typeUsers'] = $user["Status"];
                }
            } else {
                $response["message"] = "كلمة المرور غير صحيحة";
            }
        }else if($user['VerificationStatus']== 0){
            $response["message"] = "الحساب غير مفعل يرجى مراجعة البريد الالكتروني";
        }
        } else {
            $response["message"] = "  الايميل غير موجود يرجى تأكد من الايميل او إنشاء حساب جديد";
        }
    } else {
        $response["message"] = " يرجى عدم ترك الحقول فارغة ";
    }
    // echo  ($postData);
    echo  json_encode($response);

}
