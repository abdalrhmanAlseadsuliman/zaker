<?php
include "../auth/authUser.php";
if (isSession()) {
  if (isUserLoggedIn()) {
    redirectToUserDashboard();
  } elseif (isUserAdmin()) {
    redirectToAdminDashboard();
  }
}
if (setCookiesToSession()) {
  if (isUserLoggedIn()) {
    redirectToUserDashboard();
  } elseif (isUserAdmin()) {
    redirectToAdminDashboard();
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
  <link href="../css/tailwind.css" rel="stylesheet">
  <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
  <style>
    .gradient {
      background: linear-gradient(90deg, #093637 0%, #44a08d 100%);
      /* background: linear-gradient(90deg, #0F2027 0%, #203A43 75%, #2C5364 100%); */
    }

    @font-face {
      font-family: Harmattan;
      src: url(Harmattan-Regular.ttf);
    }

    * {
      font-family: Harmattan;
    }
  </style>
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
          <button id="nav-toggle" class="flex items-center p-1 text-white hover:text-gray-500 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
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
            <a class="text-black hover:text-gray-600 text-black no-underline hover:underline py-2 px-4" href="signIn.php">تسجيل الدخول</a>
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
        <form id="MyForgotPassword">
          <div class="border-b border-gray-900/10 p-12 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
              إعادة تعين كلمة المرور
            </h2>
            <h4 class="w-full my-2 text-xl leading-tight text-center text-gray-800">ادخل بريدك الالكتروني وسنرسل لك رابطاً لإعادة تعين كلمة المرور</h4>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-6">
                <label for="first-name" class="block text-lg font-medium leading-6 text-gray-900">الايميل</label>
                <div class="mt-2">
                  <input type="email" name="Email" id="inputEmail" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  <h3 id="forgotResponse" class="text-center text-emerald-600 mt-2 mb-0"></h3>
                </div>
              </div>


              <div class="mt-6 w-full">
                <button type="submit" onclick="forgotPassword(event)" class="rounded-md w-full bg-emerald-600 px-1 py-2 text-lg font-semibold text-white shadow-sm hover:bg-emerald-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  ارسل رابط إعادة التعين
                </button>
              </div>

              <div class="mt-6 w-full">
                <a href="signIn.php" class="text-emerald-600 text-lg hover:underline">العودة لواجهة تسجيل الدخول</a>
              </div>
              <br>
            </div>
        </form>

        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
      </div>
    </section>
  </div>

  <!--Footer-->
  <footer class="bg-white">
    <div class="container mx-auto px-8">
      <div class="w-full flex flex-col md:flex-row py-6 ">
        <div class="flex-1 mb-6 text-black text-center sm:text-right">
          <a class="text-emerald-600 no-underline hover:no-underline font-bold text-4xl" href="../index.php">
            ذاكر
          </a>
        </div>

        <div class="flex">
          <a href="https://www.facebook.com/rabe3almoheben" class="flex-1 md:w-20"><svg fill="#429E8C" height="40px" width="40px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve" stroke="#429E8C">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g>
                  <path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M272.8,560.7 c-20.8,20.8-44.9,37.1-71.8,48.4c-27.8,11.8-57.4,17.7-88,17.7c-30.5,0-60.1-6-88-17.7c-26.9-11.4-51.1-27.7-71.8-48.4 c-20.8-20.8-37.1-44.9-48.4-71.8C-107,461.1-113,431.5-113,401s6-60.1,17.7-88c11.4-26.9,27.7-51.1,48.4-71.8 c20.9-20.8,45-37.1,71.9-48.5C52.9,181,82.5,175,113,175s60.1,6,88,17.7c26.9,11.4,51.1,27.7,71.8,48.4 c20.8,20.8,37.1,44.9,48.4,71.8c11.8,27.8,17.7,57.4,17.7,88c0,30.5-6,60.1-17.7,88C309.8,515.8,293.5,540,272.8,560.7z"></path>
                  <path d="M146.8,313.7c10.3,0,21.3,3.2,21.3,3.2l6.6-39.2c0,0-14-4.8-47.4-4.8c-20.5,0-32.4,7.8-41.1,19.3 c-8.2,10.9-8.5,28.4-8.5,39.7v25.7H51.2v38.3h26.5v133h49.6v-133h39.3l2.9-38.3h-42.2v-29.9C127.3,317.4,136.5,313.7,146.8,313.7z"></path>
                </g>
              </g>
            </svg></a>
          <a href="https://www.youtube.com/@AounalKaddoumi" class="flex-1 md:w-12"><svg fill="#429E8C" height="40px" width="40px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g>
                  <path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M272.8,560.7 c-20.8,20.8-44.9,37.1-71.8,48.4c-27.8,11.8-57.4,17.7-88,17.7c-30.5,0-60.1-6-88-17.7c-26.9-11.4-51.1-27.7-71.8-48.4 c-20.8-20.8-37.1-44.9-48.4-71.8C-107,461.1-113,431.5-113,401s6-60.1,17.7-88c11.4-26.9,27.7-51.1,48.4-71.8 c20.9-20.8,45-37.1,71.9-48.5C52.9,181,82.5,175,113,175s60.1,6,88,17.7c26.9,11.4,51.1,27.7,71.8,48.4 c20.8,20.8,37.1,44.9,48.4,71.8c11.8,27.8,17.7,57.4,17.7,88c0,30.5-6,60.1-17.7,88C309.8,515.8,293.5,540,272.8,560.7z"></path>
                  <path d="M196.9,311.2H29.1c0,0-44.1,0-44.1,44.1v91.5c0,0,0,44.1,44.1,44.1h167.8c0,0,44.1,0,44.1-44.1v-91.5 C241,355.3,241,311.2,196.9,311.2z M78.9,450.3v-98.5l83.8,49.3L78.9,450.3z"></path>
                </g>
              </g>
            </svg></a>
        </div>
      </div>
      <p class="text-center text-emerald-600">تطوير فريق خادم - قسم البرمجة </p>
      <br>
    </div>
  </footer>
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