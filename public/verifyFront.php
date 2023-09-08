<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Zaker</title>
  <meta name="description" content="zaker.click" />
  <meta name="keywords" content="" />
  <meta name="author" content="5adem" />
  <link href="./css/tailwind.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/odometer.css" />
  <!--Replace with your tailwind.css once created-->
  <script src="../js/fontawesome.js"></script>
  <link href="../css/myStyle.css" rel="stylesheet">
 
</head>

<body class="leading-normal tracking-normal text-white gradient" dir="rtl">
  <!--Nav-->
  <header>
  <nav id="header" class="fixed container z-30 mx-auto px-8 top-0 text-white" style="min-width:100%">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="../index.php">
            <!--Icon from: http://www.potlabicons.com/ -->
            <img class="w-20 md:w-5/5 z-50 rounded-full bg-white" src="../img/logo.png" />
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-white hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-gray-600 lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
              <a class="inline-block py-2 text-white hover:text-gray-300 hover:underline px-4 text-black font-bold no-underline" href="../index.php">الرئيسية</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white hover:text-gray-300 text-black no-underline hover:underline py-2 px-4" href="../index.php#salat">عدد الصلوات</a>
            </li>
           
              <li id="register" class="mr-3" >
                <a class="inline-block text-white hover:text-gray-300 text-black no-underline hover:underline py-2 px-4" href="./public/signUp.php">إنشاء حساب</a>
              </li>
          </ul>
          <button id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a class="text-gray-800 hover:text-gray-600 text-black no-underline hover:underline py-2 px-4" href="./public/signIn.php">تسجيل الدخول</a>
          </button>
        

          <!-- <? // php elseif (isUserLoggedIn()) : ?> -->
          <li class="mr-3" id="logout" style="display:none">
                <a class="inline-block text-white hover:text-gray-300 text-black no-underline hover:underline py-2 px-4" href="../auth/logout.php"> تسجيل الخروج </a>
          </li>
          <!-- <button id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a class="text-gray-800 hover:text-gray-600 text-black no-underline hover:underline py-2 px-4" href="./userDashboard.php">لوحة التحكم</a>
          </button> -->
       
        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
  </header>

  <!--Hero-->
  <br />
  <div class="pt-24">
  <div class="container px-7 mx-auto ">

<h3 id="AllPrayers" class="my-4 text-black bg-clip-text text-transparent text-center bg-gradient-to-r from-emerald-900 to-emerald-300 text-4xl leading-tight odometer" style="color:#fff; margin: 0 auto; font-size:50px;display: block;" dir="ltr">
</h3>

<h3 id="textAllPrayers" class="my-4 text-black bg-clip-text text-transparent text-center bg-gradient-to-r from-emerald-900 to-emerald-300 text-4xl leading-tight" style="color:#fff; margin: 0 auto; font-size:30px; display: block;" >
  صلاة على الحبيب الأعظم ﷺ
</h3>
</div>
  <div class="container px-7 mx-auto flex flex-wrap flex-col md:flex-row items-center">
      <!--Left Col-->
      <div class="flex flex-col w-full md:w-3/5 justify-center items-center text-right">
        <p class="uppercase tracking-loose w-full">موقع ذاكر</p>
        <h1 class="my-4 text-5xl font-bold leading-tight">
          نحو مليارية الصلاة والسلام على أشرف الأنام ﷺ
         
        </h1>
        <p class="leading-normal text-2xl mb-8">
          الحمد لله وصلى الله وسلَّم وبارك على حبيبه ومصطفاه بجميع الصلوات
          والتسليمات التي يصلي بها أهل الوجود اللهم اجعلنا من ألهج الخلق في
          الصلاة والسلام عليه ومن أنهج الخلق في متابعته عليه الصلاة والسلام
          وفي أبهج الخلق في مشاهدته ومطالعته عليه الصلاة والسلام
        </p>
        <form class="flex flex-col w-full md:w-3/5 justify-center items-center text-right" id="MyParyersNumber" style="display: none;">

        <div class="relative">
          <input type="number" id="prayerCount" name="prayerCount" list="myList" class="block text-black flex-1 bg-white border border-gray-300 hover:border-gray-500 rounded px-4 py-2 leading-tight focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" placeholder="أدخل عدد صلواتك" />
          <datalist id="myList">
            <option value="100"></option>
            <option value="500"></option>
            <option value="1000"></option>
            <option value="2000"></option>
            <option value="3000"></option>
            <option value="5000"></option>
            <option value="10000"></option>
          </datalist>
        </div>
        <button onClick="addPrayersIndex(event)" class="mx-auto lg:mx-0 w-1/2 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-2 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          ارسل صلواتك
        </button>
        <span id="prayerCountError" class="text-gray-800"></span>
        </form>
        <div id="messageResponse" class="text-center  "> </div>
      </div>

      <!--Right Col-->
      <div class="w-full md:w-2/5 p-12 text-center">
        <img class="w-full md:w-5/5 z-50 rounded-full bg-gray-300" src="../img/logo.png" />
      </div>
    </div>
  </div>
  <div class="relative -mt-9 lg:-mt-30">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
          <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
          <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
          <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
        </g>
        <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
          <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
        </g>
      </g>
    </svg>
  </div>


  <!--Footer-->
  <footer class="bg-white">
    <div class="container mx-auto px-8">
      <div class="w-full flex flex-col md:flex-row py-6">
        <div class="flex-1 mb-6 text-black text-center sm:text-right">
          <a class="no-underline hover:no-underline font-bold text-4xl" style="color:#317e71" href="index.php">
            ذاكر
          </a>
        </div>

        <div class="flex justify-flex-center">


          <a href="https://www.facebook.com/rabe3almoheben" style="font-size: 34px; color:#317e71; margin: 0 10px;">
            <i class="fab fa-facebook" ></i>
          </a>

          <a href="https://www.youtube.com/@AounalKaddoumi" style="font-size: 34px; color:#317e71 ;margin: 0 10px;">
            <i class="fab fa-youtube"></i>
          </a>

          <a href="https://t.me/ZakerClick" class="flex-1 md:w-12 text-gray-600" style="font-size: 34px; color:#317e71;margin: 0 10px;">
            <i class="fab fa-telegram-plane"></i>
          </a>


        </div>
      </div>
      <p class="text-center" style="color:#317e71">
        تطوير فريق خادم - قسم البرمجة
      </p>
      <br />
    </div>
  </footer>

  <a href="https://t.me/ZakerClick" class="teleIcon">
    <i class="fab fa-telegram" style="background: #fff; border-radius: 50%; font-size: 40px;"></i>
  </a>
  <script>
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var navcontent = document.getElementById("nav-content");
    var navaction = document.getElementById("navAction");
    var brandname = document.getElementById("brandname");
    var toToggle = document.querySelectorAll(".toggleColour");

    document.addEventListener("scroll", function() {
      /*Apply classes for slide in bar*/
      scrollpos = window.scrollY;

      if (scrollpos > 10) {
        header.classList.add("bg-white");
        header.classList.add("text-black");
        navaction.classList.remove("bg-white");
        navaction.classList.add("gradient");
        navaction.classList.remove("text-gray-800");
        navaction.classList.add("text-white");
        //Use to switch toggleColour colours
        for (var i = 0; i < toToggle.length; i++) {
          toToggle[i].classList.add("text-gray-800");
          toToggle[i].classList.remove("text-white");
        }
        header.classList.add("shadow");
        navcontent.classList.remove("bg-gray-100");
        navcontent.classList.add("bg-white");
        navcontent.classList.add("text-black");
      } else {
        header.classList.remove("bg-white");
        navaction.classList.remove("gradient");
        navaction.classList.add("bg-white");
        navaction.classList.remove("text-white");
        navaction.classList.add("text-gray-800");
        //Use to switch toggleColour colours
        for (var i = 0; i < toToggle.length; i++) {
          toToggle[i].classList.add("text-white");
          toToggle[i].classList.remove("text-gray-800");
        }

        header.classList.remove("shadow");
        navcontent.classList.remove("bg-white");
        navcontent.classList.add("bg-gray-100");
      }
    });
  </script>
  <script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
      var target = (e && e.target) || (event && event.srcElement);

      //Nav Menu
      if (!checkParent(target, navMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, navMenu)) {
          // click on the link
          if (navMenuDiv.classList.contains("hidden")) {
            navMenuDiv.classList.remove("hidden");
          } else {
            navMenuDiv.classList.add("hidden");
          }
        } else {
          // click both outside link and outside menu, hide menu
          navMenuDiv.classList.add("hidden");
        }
      }
    }

    function checkParent(t, elm) {
      while (t.parentNode) {
        if (t == elm) {
          return true;
        }
        t = t.parentNode;
      }
      return false;
    }
  </script>
   <script>
        // استدعاء الدالة verifyEmail() عند حدوث حدث "تحميل الصفحة"
        document.addEventListener("DOMContentLoaded", function() {
            verifyEmail();
        });
    </script>
    
    <script src="../js/odometer.js"></script>
  <script src="../js/filejs.js"></script>
  <script src="../js/axios.js"></script>
  <script>
    window.onload = getPrayersAll;
  </script>

  </body>

</html>