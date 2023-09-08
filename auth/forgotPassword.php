<?php
include "functionRegisteration.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $postData = $data;
    // $postData = $_POST;
    // var_dump($postData);


    $response = [];


    if (count($postData) === 4) {
        $requiredFields = [
            'email' => 'البريد الإلكتروني',
            'vCode' => 'كود التحقق',
            'Password' => 'كلمة المرور',
            'PasswordConfirm' => 'تأكيد كلمة المرور'
        ];
        if (isValidData($requiredFields, $postData, $response)) {
            foreach ($postData as $key => $value) {
                $postData[$key] = sanitizeInput($value);
            }
            $email = $postData['email'];
            $VCode = $postData['vCode'];
            $password = $postData['Password'];
            $confirmPassword = $postData['PasswordConfirm'];

            if (
                isPasswordStrong($password, $response) &&
                validate_password($password, $confirmPassword, $response)
            ) {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // تشفير كلمة المرور
                $newv_cod = generateRandomCode(10);
                $sql = "SELECT * FROM users WHERE Email =  '$email' && VerificationId= '$VCode'";
                $result = mysqli_query($connection, $sql);
                // إنشاء كوكيز لتخزين بعض البيانات
                if (mysqli_num_rows($result) == 1) {
                    $user = mysqli_fetch_assoc($result);
                    $sql = "UPDATE users SET Password = '$hashedPassword', VerificationId = '$newv_cod' WHERE Email = '$user[Email]' AND VerificationId = '$user[VerificationId]'";
                    if (mysqli_query($connection, $sql)) {
                        $response['message'] = " لقد تم تعديل كلمة السر بنجاح ";
                        $response['link'] = "signIn.php";
                    }
                } else {
                    $response['message'] = " انتهت المدة المخصصة لإعادة تعين كلمة المرور حاول مرة اخرى ";
                }
            }
        }
    } elseif (count($postData) === 1) {

        if (isset($postData['Email']) && !empty($postData['Email'])) {

            $postData['Email'] = sanitizeInput($postData['Email']);
            $email = $postData['Email'];
            // echo $email . " " . $password;
            $sql = "SELECT * FROM users WHERE Email =  '$email'";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);
                $vCode = $user['VerificationId'];
                if (send_forgotPassword_email($email, $vCode)) {
                    $response["message"] = " لقد تم ارسال بريد إلكتروني يحوي رابط إعادة تعين كلمة المرور";
                } else {
                    $response["message"] = " حدث خطا اثناء الارسال التاكد من البيانات المدخلة وإعاودة المحاولة ";
                }
            } else {
                $response["message"] = " البريد الإلكتروني المدخل غير مسجل لدينا ";
            }
        } else {
            $response["message"] = " يرجى عدم ترك الحقول فارغة ";
        }
    }

    echo  json_encode($response);
}
