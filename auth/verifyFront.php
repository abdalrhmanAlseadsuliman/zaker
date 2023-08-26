<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response Page</title>
    <!-- تضمين مكتبة Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap5.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url("../image/verifyBackground.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .message-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 93vh;
        }
        .card {
            background-color: rgba(150, 150, 150, 0.5);
        }
        #messageResponse {
            color: #fafafa;
            font-size: 26px;
        }
    </style>
</head>
<body>
    <div class="message-container ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body ">
                            <div id="messageResponse" class="text-center  ">

                            </div>
                            <div id="countdown" class="text-center text-white mt-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
   
   <script>
        // استدعاء الدالة verifyEmail() عند حدوث حدث "تحميل الصفحة"
        document.addEventListener("DOMContentLoaded", function() {
            verifyEmail();
        });
    </script>
    <!-- تضمين ملفات Bootstrap اللازمة -->
    <script src="../js/filejs.js"></script>
    <script src="../js/bootstrap5.js"></script>
</body>
</html>
