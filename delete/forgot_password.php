<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> إعادة تعين </title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="./js/fontawesome.js" crossorigin="anonymous"></script>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url("./image/a-view-of-the-mosque-2560x1253.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
        }

         
    </style>
</head>

<body class="bg-primary" dir="rtl">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 bg-white bg-opacity-25">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4"> إعادة تعين كلمة السر </h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">
                                       قم بإدخال كلمة المرور الجديدة 
                                    </div>
                                    <form id="MyResetPassword">
                                        <div class="form-floating mb-3">
                                            <input name="Password" class="form-control" id="inputEmail" type="password" placeholder="ادخل محارف وارقام ورموز" />
                                            <label for="inputEmail"> كلمة المرور الجديدة </label>
                                            <span id="PasswordError" class="error">  </span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="PasswordConfirm" class="form-control" id="inputEmail" type="password" placeholder="ادخل محارف وارقام ورموز" />
                                            <label for="inputEmail"> يرجى إعادة إدخال كلمة المرور </label>
                                            <span id="PasswordConfirmError" class="error"></span>

                                        </div>
                                        <div  class="d-flex align-items-center justify-content-center mt-0 mb-0" id="forgotResponseMessage" >
                                            <h3 id="resetResponse" class="text-center mt-0 mb-0" style="display:block" ></h3>
                                            <h3 id="countdown" class="text-center mt-0 mb-0 font-1" style="display:block"></h3>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="login.php"> العودة الى تسجيل الدخول </a>
                                            <a class="btn btn-primary" href="login.php" onclick="resetPassword(event)">  إعادة التعين </a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.php"> ليس لديك حساب؟ إنشاء حساب جديد؟</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/bootstrap5.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/filejs.js"></script>

</body>

</html>