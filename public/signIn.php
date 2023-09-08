<?php
include "../auth/authUser.php";
if (isSession()) {
  if (isUserLoggedIn()) {
    // redirectToUserDashboard();
    redirectToUserIndex();
  } elseif (isUserAdmin()) {
    // redirectToAdminDashboard();
    redirectToUserIndex();
  }
}
if (setCookiesToSession()) {
  if (isUserLoggedIn()) {
    // redirectToUserDashboard();
    redirectToUserIndex();
  } elseif (isUserAdmin()) {
    // redirectToAdminDashboard();
    redirectToUserIndex();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>
    Zaker
  </title>
  <meta name="description" content="zaker.click" />
  <meta name="keywords" content="" />
  <meta name="author" content="5adem" />
  <link href="./css/tailwind.css" rel="stylesheet">
  <script src="../js/fontawesome.js"></script>
  <link href="../css/myStyle.css" rel="stylesheet">

</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif" dir="rtl">
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
              <a class="inline-block text-white hover:text-gray-300 text-black no-underline  hover:underline py-2 px-4" href="../index.php#salat">عدد الصلوات</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white hover:text-gray-300 text-black no-underline hover:underline py-2 px-4" href="signUp.php">التسجيل</a>
            </li>
          </ul>
          <button id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a class="text-black hover:text-gray-600 text-black no-underline hover:underline py-2 px-4" href="signIn.php"> تسجيل الدخول </a>
          </button>
        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
  </header>

  <!--Hero-->
  <br />
  <div class="pt-24">
    <section class="bg-white border-b py-8">
      <div class="container max-w-5xl mx-auto m-8">
        <form id="MyLogin">
          <div class="border-b border-gray-900/10 p-12 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
              تسجيل الدخول
            </h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="first-name" class="block text-lg font-medium leading-6 text-gray-900">الايميل</label>
                <div class="mt-2">
                  <input type="email" name="Email" id="inputEmail" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="last-name" class="block text-lg font-medium leading-6 text-gray-900">كلمة السر</label>
                <div class="mt-2">
                  <input type="password" name="Password" id="inputPassword" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                </div>
              </div>

              <div class="sm:col-span-4">
                <div class="mt-2">
                  <fieldset>
                    <div class="mt-4 space-y-6">
                      <div class="flex items-center gap-x-3">
                        <legend class="text-lg font-semibold leading-6 text-gray-900">
                          تذكرني في المرة القادمة
                        </legend>
                        <input id="inputRememberPassword" name="Remember" value="RememberPass" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      </div>
                    </div>
                  </fieldset>
                  <span id="loginSuccess" class="error text-rose-600 text-lg"></span>
                </div>
              </div>
            </div>
            <br>
            <a href="forgetPassword.php" class="text-emerald-600 text-lg hover:underline">هل نسيت كلمة المرور؟</a>
            <div class="mt-6 w-full">
              <button type="submit" onclick="handleLogin(event)" class="rounded-md w-full bg-emerald-600 px-3 py-2 text-lg font-semibold text-white shadow-sm hover:bg-emerald-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                تسجيل الدخول
              </button>
            </div>
          </div>
        </form>

        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
      </div>
    </section>
  </div>
  <!-- <div class="relative -mt-9 lg:-mt-30">
      <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path
              d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
              opacity="0.100000001"
            ></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
          </g>
          <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path
              d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
            ></path>
          </g>
        </g>
      </svg>
    </div> -->

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

  <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
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
  <script src="../js/filejs.js"></script>

</body>

</html>