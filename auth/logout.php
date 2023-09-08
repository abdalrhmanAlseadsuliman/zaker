<!-- <?php 
    // session_start();
    // session_unset();
    // session_destroy();
    // header("location:./login_maraqar.php");

    
?> -->

<?php
// تأكد من بدء الجلسة قبل القيام بأي شيء آخر

// @ob_start();
session_start();

// إزالة الكوكيز المرتبطة بموقعك
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-3600);
        setcookie($name, '', time()-3600, '/');
    }
}

// إنهاء الجلسة
session_destroy();

// إعادة توجيه المستخدم إلى صفحة تسجيل الدخول
header("Location:../public/signIn.php");
exit();
?>