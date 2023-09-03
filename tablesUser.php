<?php
session_start();
if (isset($_SESSION['typeUsers']) && !empty($_SESSION['typeUsers']) && $_SESSION['typeUsers'] === 'admin') {
    header("Location:adminDashboard.php");
} elseif (
    !isset($_SESSION['typeUsers']) || empty($_SESSION['typeUsers']) || $_SESSION['typeUsers'] !== 'user'
    || !isset($_SESSION['Email']) || empty($_SESSION['Email'])
) {
    header("Location: auth/logout.php");
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
    <title>لوحة تحكم</title>
    <!-- <link href="css/datatable.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="css/datatable.1.13.6.css">

    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/fontawesome.js"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="userDashboard.php"> ذاكر </a>
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
                    <li><a class="dropdown-item" href="auth/logout.php">تسجيل الخروج</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="userDashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            لوحة التحكم
                        </a>
                        <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.php">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.php">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.php">Login</a>
                                        <a class="nav-link" href="register.php">Register</a>
                                        <a class="nav-link" href="password.php">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.php">401 Page</a>
                                        <a class="nav-link" href="404.php">404 Page</a>
                                        <a class="nav-link" href="500.php">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div> -->
                        <a class="nav-link" href="chartsUser.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            رسوم بيانية
                        </a>
                        <!-- <div class="sb-sidenav-menu-heading"></div> -->

                        <a class="nav-link" href="tablesUser.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            جداول
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    ذاكر
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">لوحة التحكم</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"> <a href="userDashboard.php">لوحة التحكم</a></li>
                        <li class="breadcrumb-item active"> جداول </li>
                    </ol>
                    <!-- <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Primary Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Warning Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Success Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <form id="MyParyersNumber">
                        <div class="d-flex justify-content-between align-items-center" dir="rtl">
                            <label for="prayerCount">أدخل عدد صلواتك اليوم:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="prayerCount" name="prayerCount">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" onclick="addPrayers(event)">ارسال</button>
                                </div>
                                <span id="prayerCountError"></span>
                            </div>
                        </div>
                    </form>

                    <div class="card mb-4 mt-3">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                             جدول صلواتك في اليومية
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ترتيب</th>
                                        <th>عدد الصلوات</th>
                                        <th>التاريخ</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ترتيب</th>
                                        <th>عدد الصلوات</th>
                                        <th>التاريخ</th>
                                    </tr>
                                </tfoot>
                                <tbody id="bodyTable">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="card mb-4 mt-3">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            جدول صلواتك الشهرية
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimpleAll">
                                <thead>
                                    <tr>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody id="">
                                    <tr>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; فريق ذاكر</div>
                        <div>
                            <a href="#">اهداف الحملة</a>
                            &middot;
                            <a href="#">نبذة عن فريق ذاكر</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/filejs.js"></script>
    <script src="js/chartLib.js"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>

    <script src="js/axios.js"></script>
    <script src="js/bootstrap5.js"></script>
    <script src="js/scripts.js"></script>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/datatables1.13.6.js"></script>
    <script>
        window.addEventListener('load', async function() {
            if (!localStorage.getItem('prayersData')) {
                localStorage.removeItem('prayersData');
            }

            try {
                const x = await getUsersDataNumber();
                const formData = new FormData();
                formData.append("userId", x['UserId']);

                const response = await axios.post("http://localhost/zaker/prayersHandling/getPrayers.php", formData);
                const prayersData = response.data;

                localStorage.setItem('prayersData', JSON.stringify(prayersData));

                var table = $('#datatablesSimple').DataTable({
                    data: prayersData,
                    columns: [{
                            title: "ترتيب",
                            data: null,
                            render: function(data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            title: "عدد الصلوات",
                            data: "NumberPrayers"
                        },
                        {
                            title: "التاريخ",
                            data: "Date"
                        }
                    ]
                });
                var aggregatedData = {};
                prayersData.forEach(function(row) {
                    var email = row["Email"];
                    var numberPrayers = parseInt(row["NumberPrayers"]);
                    var dateParts = row.Date.split('-');
                    var month = dateParts[1];

                    if (!aggregatedData[email]) {
                        aggregatedData[email] = {
                            email: email,
                            fullName: row["full_name"],
                            age: row["Age"],
                            nationality: row["Nationality"],
                            gender: row["Gender"],
                            monthlyPrayers: {}
                        };
                    }

                    if (!aggregatedData[email].monthlyPrayers[month]) {
                        aggregatedData[email].monthlyPrayers[month] = 0;
                    }

                    aggregatedData[email].monthlyPrayers[month] += numberPrayers;
                });
                console.log(aggregatedData)

                var table = $('#datatablesSimpleAll').DataTable({
                    data: Object.values(aggregatedData),
                    columns: [{
                            title: "ترتيب",
                            data: null,
                            render: function(data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },


                        {
                            title: "محرم",
                            data: function(row) {
                                return row.monthlyPrayers["01"] || 0;
                            }
                        },
                        {
                            title: "صفر",
                            data: function(row) {
                                return row.monthlyPrayers["02"] || 0;
                            }
                        },
                        {
                            title: "ربيع الانور",
                            data: function(row) {
                                return row.monthlyPrayers["03"] || 0;
                            }
                        },
                        {
                            title: "ربيع الثاني",
                            data: function(row) {
                                return row.monthlyPrayers["04"] || 0;
                            }
                        },
                        {
                            title: "جمادى الاول",
                            data: function(row) {
                                return row.monthlyPrayers["05"] || 0;
                            }
                        },
                        {
                            title: "جمادى الثاني",
                            data: function(row) {
                                return row.monthlyPrayers["06"] || 0;
                            }
                        },
                        {
                            title: "رجب",
                            data: function(row) {
                                return row.monthlyPrayers["07"] || 0;
                            }
                        },
                        {
                            title: "شعبان",
                            data: function(row) {
                                return row.monthlyPrayers["08"] || 0;
                            }
                        }, {
                            title: "رمضان",
                            data: function(row) {
                                return row.monthlyPrayers["09"] || 0;
                            }
                        }, {
                            title: "شوال",
                            data: function(row) {
                                return row.monthlyPrayers["10"] || 0;
                            }
                        },
                        {
                            title: "ذي القعدة",
                            data: function(row) {
                                return row.monthlyPrayers["11"] || 0;
                            }
                        },
                        {
                            title: "ذي الحجة",
                            data: function(row) {
                                return row.monthlyPrayers["12"] || 0;
                            }
                        },
                        {
                            title: "مجموع الصلوات",
                            data: function(row) {
                                var monthlyPrayers = Object.values(row.monthlyPrayers);
                                return monthlyPrayers.reduce((a, b) => a + b, 0);
                            }
                        }

                    ]
                });

            } catch (error) {
                console.error("حدث خطأ أثناء إرسال الطلب:", error);
            }
        });
    </script>




</body>

</html>