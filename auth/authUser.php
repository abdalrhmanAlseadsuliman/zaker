<?php
session_start();
function isSession(){
    if (
        isset($_SESSION['Email']) && isset($_SESSION['typeUsers']) && 
        !empty($_SESSION['Email']) && !empty($_SESSION['typeUsers'])
        ) {
            return true;
        }
        return false;

}
function setCookiesToSession() {
    if (
        isset($_COOKIE['Email']) && isset($_COOKIE['typeUsers']) && 
        !empty($_COOKIE['Email']) && !empty($_COOKIE['typeUsers'])
        ) {
        $_SESSION['Email'] = $_COOKIE['Email'];
        $_SESSION['typeUsers'] = $_COOKIE['typeUsers'];
        return true;
    }else{
        return false;
    }

   
}

function isUserLoggedIn() {
    return  isset($_SESSION['Email']) && !empty($_SESSION['Email']) && isset($_SESSION['typeUsers']) && $_SESSION['typeUsers'] === 'user';
}

function isUserAdmin() {
    return isset($_SESSION['Email']) && !empty($_SESSION['Email']) && isset($_SESSION['typeUsers']) && $_SESSION['typeUsers'] === 'admin';
}

function redirectToUserDashboard() {
    header("Location: ../userDashboard.php");
    exit;
}

function redirectToUserIndex() {
    header("Location: ../index.php");
    exit;
}

function redirectToAdminDashboard() {
    header("Location: ../adminDashboard.php");
    exit;
}

function redirectToLoginPage() {
    header("Location: ../login.php");
    exit;
}
function redirectToLogoutPage() {
    header("Location: ../auth/logout.php");
    exit;
}
?>