<?php
include "../db/dbConn.php";
include "../mailFunction.php";

session_start();

function isPasswordStrong($password, &$errors)
{
    // يحتوي الرمز المرجعي على مجموعة من الأحرف الممكنة التي قد تستخدم في كلمة مرور قوية
    $referenceChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+{}|:<>?,./';

    // يتم تحديد الحد الأدنى لطول كلمة المرور وعدد الأحرف المختلفة المطلوبة من الرمز المرجعي
    $minLength = 8;
    $minDiffChars = 3;

    // تحقق من أن كلمة المرور تلبي الحد الأدنى لطولها
    if (strlen($password) < $minLength) {
        $errors["Password"]= " كلمة المرور قصيرة يجب ان تكون اكبر من ثمانية رموز ";  
        return false;
    }

    $diffChars = 0;

    // يتم التحقق من وجود الأحرف المختلفة في كلمة المرور وحساب الأحرف المختلفة
    for ($i = 0; $i < strlen($referenceChars); $i++) {
        if (strpos($password, $referenceChars[$i]) !== false) {
            $diffChars++;
        }
    }

    // يتم التحقق من أن كلمة المرور تحتوي على عدد كافٍ من الأحرف المختلفة
    if ($diffChars < $minDiffChars) {
        $errors["Password"]= "كلمة المرور ضعيفة جدا حول استخدام احرف كبيرة وصغيرة وارقام ورموز";
        return false;
    }

    // تمرير جميع المعايير ، وبالتالي فإن كلمة المرور قوية
    return true;
}



function validate_password($password, $confirmPassword,&$errors){
    if ($password !== $confirmPassword) {
        $errors["PasswordConfirm"] = "كلمتا المرور غير متطابقتين!";
        return false;
    }
    return true;
}

function validate_email($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function check_email_exists($connection, $email){
    $sql = "SELECT UserID FROM users WHERE Email='$email' ";
    $result = mysqli_query($connection, $sql);
    return mysqli_num_rows($result) > 0;
}

function insert_user($connection,$data, $password ,$v_cod){
    $sql = "INSERT INTO users (FirstName, LastName, Email, Age, Gender,Nationality, Password, Status,VerificationId, VerificationStatus) VALUES ('$data[FirstName]', '$data[LastName]', '$data[Email]', $data[Age], '$data[Gender]', '$data[Nationality]','$password', 'user' ,'$v_cod', 0)";
    return mysqli_query($connection, $sql);
}

function send_verification_email($email,$vCode){
    // استخدم الدالة المناسبة لإرسال البريد الإلكتروني، مثل PHPMailer أو mail()
    // يمكنك استخدام دالة mailFunction الموجودة في ملف mailFunction.php
    $subject = " رسالة تحقق من الايميل "; 
    $message = " اهلا وسهلا بكم في موقع ذاكر  .<br>انقر على الرابط أدناه للتحقق من عنوان البريد الإلكتروني <a href='http://localhost/zaker/auth/verifyFront.php?email=$email&vCode=$vCode'> تحقق </a>";
    return sendmail($email, $subject, $message);
}


function send_forgotPassword_email($email,$vCode){
    // استخدم الدالة المناسبة لإرسال البريد الإلكتروني، مثل PHPMailer أو mail()
    // يمكنك استخدام دالة mailFunction الموجودة في ملف mailFunction.php
    $subject = " إعادة تعين كلمة المرور "; 
    $message = " اهلا وسهلا بكم في موقع ذاكر  .<br> انقر على الرابط أدناه لإعادة تعين كلمة المرور <a href='http://localhost/zaker/forgot_password.php?email=$email&vCode=$vCode'> إعادة تعين </a>";
    return sendmail($email, $subject, $message);
}


// var_dump($_SESSION);
function isValidData($fieldsName,$data, &$errors) {
    $requiredFields = $fieldsName;

    $isValid = true;
    foreach ($requiredFields as $field => $fieldName) {
        if (!isset($data[$field]) || empty($data[$field])) {
            $isValid = false;
            $errors[$field] = "حقل $fieldName مفقود";
        }
    }
    
    return $isValid;
}

// $errors = [];

function sanitizeInput($input) {
    $cleanedInput = trim($input);
    $cleanedInput = htmlspecialchars($cleanedInput, ENT_QUOTES, 'UTF-8');
    $cleanedInput = stripslashes($cleanedInput); // إزالة علامات \

    return $cleanedInput;
}



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
?>