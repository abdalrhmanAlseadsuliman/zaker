<?php
session_start();
if (isset($_SESSION['typeUsers']) && !empty($_SESSION['typeUsers']) && $_SESSION['typeUsers'] === 'user') {
    header("Location:userDashboard.php");
} elseif (
    !isset($_SESSION['typeUsers']) || empty($_SESSION['typeUsers']) || $_SESSION['typeUsers'] !== 'admin'
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
    <title>Dashboard - Admin</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="css/datatable.1.13.6.css">
    <!-- <link href="css/datatable.css" rel="stylesheet" /> -->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/fontawesome.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="adminDashboard.php"> ذاكر </a>
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
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="auth/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">رئيسية</div>
                        <a class="nav-link" href="adminDashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">عمليات</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseArticles" aria-expanded="false" aria-controls="collapseArticles">
                            <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                           إدارة المقالات
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseArticles" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="articles/addArticle.php">إضافة مقالة</a>
                                <a class="nav-link" href="articles/showArticles.php">عرض المقالات</a>
                            </nav>
                        </div>
                      
                        <div class="sb-sidenav-menu-heading">إحصائيات</div>
                        <a class="nav-link" href="charts.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            رسوم بيانية
                        </a>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            جداول
                        </a>

                       
                    </div>
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
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
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
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                   عدد الصلوات في الشهر الماضي
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                   عدد الصلوات في كل شهر
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            جدول صلوات
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ترتيب</th>
                                        <th>الاسم</th>
                                        <th>الدولة</th>
                                        <th>الجنس</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>العمر</th>
                                        <th>البريد الالكتروني</th>
                                        <th>عدد الصلوات</th>
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


    <script src="js/filejs.js"></script>
    <script src="js/chartLib.js"></script>
    <script src="assets/demo/admin-chart-area.js"></script>
    <script src="assets/demo/admin-chart-bar.js"></script>
    <!-- <script src="assets/demo/chart-pie-demo.js"></script> -->
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
                const response = await axios.get("http://localhost/zaker/prayersHandling/getPrayers.php");
                const prayersData = response.data;
                // console.log(response);

                localStorage.setItem('prayersData', JSON.stringify(prayersData));

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

                var table = $('#datatablesSimple').DataTable({
                    data: Object.values(aggregatedData),
                    columns: [{
                            title: "ترتيب",
                            data: null,
                            render: function(data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            title: "الاسم",
                            data: "fullName"
                        },
                        {
                            title: "الدولة",
                            data: "nationality"
                        },
                        {
                            title: "العمر",
                            data: "age"
                        },
                        {
                            title: "الجنس",
                            data: "gender"
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
                            title: "جمادى 2",
                            data: function(row) {
                                return row.monthlyPrayers["05"] || 0;
                            }
                        },
                        {
                            title: "جمادى2",
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
                createChartAreaAdmin(prayersData);
                createBarChartAdmin(prayersData);

                // يمكنك استخدام aggregatedData لعرض البيانات كما تريد

            } catch (error) {
                console.error("حدث خطأ أثناء إرسال الطلب:", error);
            }
        });
    </script>

</body>

</html>