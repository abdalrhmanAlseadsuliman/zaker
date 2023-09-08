<?php
include "functionRegisteration.php" ;
function callFunction($data,  &$errors,$connection){
    
    $isValid = true;
    // التحقق من قوة كلمة المرور
     if (!isPasswordStrong($data["Password"],$errors)) {
        $isValid = false;

    }

    // التحقق من تطابق كلمتي المرور
    if (!validate_password($data["Password"], $data["PasswordConfirm"],$errors)) {
        
        $isValid = false;
    }

    // التحقق من صحة البريد الإلكتروني
    if (!validate_email($data["Email"])) {
        $errors["Email"] = "البريد الإلكتروني غير صحيح!";
        $isValid = false;
    }
    if(check_email_exists( $connection, $data["Email"])){
        $errors["Email"] = " الايميل مسجل ";
        $isValid = false;
    }
    return $isValid;
}


$errors = []; // مصفوفة لتخزين رسائل الخطأ

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $postData = $data;
    // $postData = $_POST;
    $requiredFields = [
        'FirstName' => 'الاسم الأول',
        'LastName' => 'الاسم الأخير',
        'Gender' => 'الجنس',
        'Age' => 'العمر',
        'Email' => 'البريد الإلكتروني',
        'Nationality' => 'الجنسية',
        'Password' => 'كلمة المرور',
        'PasswordConfirm' => 'تأكيد كلمة المرور'
    ];
    if (isValidData($requiredFields,$postData,$errors)) {
        
        foreach ($postData as $key => $value) {
            $postData[$key] = sanitizeInput($value);
        }

      if( callFunction($postData,  $errors, $connection)){
            $hashedPassword = password_hash($postData['Password'], PASSWORD_BCRYPT); // تشفير كلمة المرور
            // var_dump($hashedPassword);
            $vCode = generateRandomCode(10);
            // var_dump($vCode);
            // var_dump($postData);
            $postData["Age"] =  (int)$postData["Age"];
            // var_dump($postData);

            if (send_verification_email($postData["Email"],$vCode)) {
                if(insert_user($connection ,$postData, $hashedPassword ,$vCode)){
                    $errors["Connection"] = "تم التسجيل بنجاح يرجى مراجعة بريدك الالكتروني";            
                }else {
                    $errors["Connection"] = "تم التسجيل بنجاح لكن لم نستطع تفعيل الحساب";            

                }
            }
            else {
                $errors["Connection"] = "عنوان البريد الإلكتروني خاطئ يرجى التاكد منه وإعادة المحاولة";
            }
            
       }

        
        
    }
}
echo json_encode($errors);



?>