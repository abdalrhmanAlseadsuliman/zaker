<?php
require_once '../auth/authUser.php';

if (!isSession()&&!setCookiesToSession()){
        redirectToLogoutPage();
}


// التحقق من صلاحيات المستخدم العادي
if (isUserLoggedIn() && !isUserAdmin()) {
    redirectToLogoutPage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>إضافة مقالة</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> -->
    <link href="../css/datatable.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="../js/fontawesome.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../adminDashboard.php"> ذاكر  </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li> -->
                    <li><a class="dropdown-item" href="../auth/logout.php">تسجيل الخروج</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                   <?php include "sideBar.php" ?>

                </div>

                <div class="sb-sidenav-footer">
                    <!-- <div class="small">Logged in as:</div> -->
                    ذاكر
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">لوحة التحكم</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="../adminDashboard.php">لوحة التحكم</a></li>
                        <li class="breadcrumb-item active"> إضافة مقالة </li>

                    </ol>
                 
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-newspaper"></i>
                            إضافة مقالة
                        </div>
                        <div class="card-body" dir="rtl">
                            <div class="container mt-5">
                                <h2 class="mb-4">إضافة مقالة جديدة</h2>
                                <form id ="MyAddArticle" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">عنوان المقالة</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                        <span id="titleErrors" class="error"></span>
                                    
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">محتوى المقالة</label>
                                        <textarea class="form-control" id="content" name="content" rows="12" required></textarea>
                                        <span id="contentErrors" class="error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="excerpt" class="form-label"> 
                                            مقتطف المقالة 
                                            <span class="text-danger" style="font-size: 12px;"> (يجب ألا يزيد عن 500 حرف) </span>
                                        </label>
                                        <textarea class="form-control" id="excerpt" name="excerpt" rows="4" required></textarea>
                                        <span id="excerptErrors" class="error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">تصنيف المقالة</label>
                                        <select class="form-select" id="category" name="category" required>
                                            <option value=""  >اختر تصنيفًا</option>
                                            <option value="تصنيف1">تصنيف 1</option>
                                            <option value="تصنيف2">تصنيف 2</option>
                                            <!-- إضافة المزيد من الخيارات حسب الحاجة -->
                                        </select>
                                        <span id="categoryErrors" class="error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="publishDate" class="form-label">تاريخ النشر</label>
                                        <input type="date" class="form-control" id="publishDate" name="publishDate" required>
                                        <span id="publishDateErrors" class="error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keywords" class="form-label">الكلمات المفتاحية</label>
                                        <input type="text" class="form-control" id="keywords" name="keywords" placeholder="كلمة1, كلمة2, كلمة3" required>
                                        <span id="keywordsErrors" class="error"></span>

                                    </div>
                                    <div class="mb-3">
                                        <label for="featuredImage" class="form-label">صورة المقالة</label>
                                        <input type="file" class="form-control" id="featuredImage" name="featuredImage"  required>
                                        <span id="imgErrors" class="error"></span>
                                    </div>
                                    <button type="submit"  class="btn btn-primary" onclick="addArticle(event)">إضافة المقالة</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php  include "../footerAll.php"; ?>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="../js/bootstrap5.js"></script>
    <script src="../js/scripts.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="../js/chartLib.js"></script> -->

    <!-- <script src="../assets/demo/chart-area-demo.js"></script> -->
    <!-- <script src="../assets/demo/chart-bar-demo.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script> -->
    <script src="../js/datatables.js"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script src="../js/axios.js"></script>
    <script src="../js/filejs.js"></script>


</body>

</html>