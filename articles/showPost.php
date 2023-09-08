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
    <title> عرض المقالات </title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> -->
    <link href="../css/datatable.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="../js/fontawesome.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../adminDashboard.php"> ذاكر </a>
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
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../auth/logout.php">Logout</a></li>
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
                        <li class="breadcrumb-item active"> عرض المقالة</li>

                    </ol>
                  

                    <!-- <div class="container"> -->
                    <div class="container mt-4">
                        <div class="row" dir="rtl">
                            <div class="col-lg-8 offset-lg-2" style="margin:0 auto">
                                <div class="card">
                                    <img id="imgArticle" src="" class="card-img-top" alt="صورة المقال">
                                    <div class="card-body">
                                        <h5 class="card-title" id="articleTitle"></h5>
                                        <p class="card-text" id="articleContent"></p>
                                        <p class="card-text" id="articlePublishDate"></p>
                                        <p class="card-text" id="articleCategory"></p>
                                        <a href="showArticles.php" class="btn btn-primary" style="margin:0px;">الرجوع إلى القائمة</a>
                                    </div>
                                </div>
                                <script>
                                    //  const articleJSON = decodeURIComponent(window.location.search.substring(1).split('=')[1]);
                                    //  const articleData = JSON.parse(articleJSON);
                                    const articleJSON = localStorage.getItem('articleData');
                                    const articleData = JSON.parse(articleJSON);
                                    document.getElementById("imgArticle").src = `./upload/${articleData.FeaturedImage}`;
                                    document.getElementById('articleTitle').textContent = articleData.Title;
                                    document.getElementById('articleContent').textContent = articleData.Content;
                                    document.getElementById('articlePublishDate').textContent = `تاريخ النشر: ${articleData.PublishDate}`;
                                    document.getElementById('articleCategory').textContent = `تصنيف: ${articleData.Category}`;
                                    // localStorage.removeItem('articleData');
                                </script>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
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