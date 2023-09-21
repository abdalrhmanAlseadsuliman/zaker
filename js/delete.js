// async function addPrayersIndex(event) {
//     event.preventDefault();

//     try {
//       let x = await getUsersDataNumber(); // انتظار حل الوعد
//       if (x == false) {
//         return;
//       }
//       // الحصول على التاريخ الحالي بالتقويم الهجري
//       var currentDate = new Date();
//       var year = currentDate.getFullYear();
//       var month = currentDate.getMonth() + 1;
//       var day = currentDate.getDate();
//       var formattedDate = day + "-" + month + "-" + year;
//       var apiUrl = "https://api.aladhan.com/v1/gToH/" + formattedDate;

//       const response1 = await fetch(apiUrl);
//       const data = await response1.json();
//       var hijriDate = data.data.hijri.date + "-" + data.data.hijri.month.ar;

//       const formData = new FormData(document.getElementById("MyParyersNumber"));
//       formData.append("userId", x["UserId"]);
//       formData.append("hijriDate", hijriDate);

//       // const dataForm = {};
//       // formData.forEach((value, key) => {
//       //   dataForm[key] = value;
//       // });
//       // console.log(dataForm.prayerCount);

//       const response = await axios.post(
//         "http://localhost/zaker/prayersHandling/prayersCountHandling.php",
//         formData
//       );
//       document.getElementById("prayerCountError").textContent = "";
//   // console.log(totalPrayers);
//       if (response.data.prayerCount) {
//         document.getElementById("prayerCountError").textContent =
//           response.data.prayerCount;
//           document.getElementById("prayerCount").value=""

//       }
//       if (response.data.insertArticle == "تم إضافة عدد صلواتك بنجاح") {
//         // let previousPrayersElement = document.getElementById("AllPrayers");
//         let previousPrayersUser = document.getElementById("usersPrayers");
//         if (previousPrayersUser) {
//           let prayer = document.getElementById("prayerCount").value;
//           let previousPrayers = parseInt(totalPrayers);
//           totalPrayers = previousPrayers + parseInt(prayer);
//           document.getElementById("AllPrayers").textContent = totalPrayers;

//           previousPrayersUser.textContent = parseInt(previousPrayersUser.textContent)+ parseInt(prayer) + "صلواتك على رسول الله";

//             alert(" تم إضافة عدد صلواتك بنجاح");
//             document.getElementById("prayerCount").value=""
//         } else {
//           let prayer = document.getElementById("prayerCount").value;
//           let previousPrayers = parseInt(totalPrayers);
//           totalPrayers = previousPrayers + parseInt(prayer);
//           document.getElementById("AllPrayers").textContent = totalPrayers;

//           alert(" تم إضافة عدد صلواتك بنجاح");
//           document.getElementById("prayerCount").value=""
//         }
//       }

//       else
//         if (response.data.insertArticle == "تم إدخال عدد صلواتك بنجاح") {
//         let previousPrayersUser = document.getElementById("usersPrayers");
//         if (previousPrayersUser) {
//           let prayer = document.getElementById("prayerCount").value;
//           let previousPrayers = parseInt(totalPrayers);
//           totalPrayers = previousPrayers + parseInt(prayer);
//           document.getElementById("AllPrayers").textContent = totalPrayers;

//           previousPrayersUser.textContent = parseInt(previousPrayersUser.textContent)+ parseInt(prayer) + "صلواتك على رسول الله";

//             alert(" تم إدخال عدد صلواتك بنجاح");
//             document.getElementById("prayerCount").value=""
//         } else {
//           let prayer = document.getElementById("prayerCount").value;
//           let previousPrayers = parseInt(totalPrayers);
//           totalPrayers = previousPrayers + parseInt(prayer);
//           document.getElementById("AllPrayers").textContent = totalPrayers;
//           alert(" تم إدخال عدد صلواتك بنجاح");
//           document.getElementById("prayerCount").value=""
//         }
//       } else {
//         alert("لم يتم الإضافة");
//         document.getElementById("prayerCount").value=""

//       }
//     } catch (error) {
//       // التعامل مع الأخطاء في الطلب
//       console.error("حدث خطأ أثناء إرسال الطلب:", error);
//     }
//   }

async function addPrayersIndex(event) {
  event.preventDefault();

  try {
    let x = await getUsersDataNumber(); // انتظار حل الوعد
    if (x == false) {
      return;
    }
    // الحصول على التاريخ الحالي بالتقويم الهجري
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = currentDate.getMonth() + 1;
    var day = currentDate.getDate();
    var formattedDate = day + "-" + month + "-" + year;
    var apiUrl = "https://api.aladhan.com/v1/gToH/" + formattedDate;

    const response1 = await fetch(apiUrl);
    const data = await response1.json();
    var hijriDate = data.data.hijri.date + "-" + data.data.hijri.month.ar;

    const formData = new FormData(document.getElementById("MyParyersNumber"));
    formData.append("userId", x["UserId"]);
    formData.append("hijriDate", hijriDate);

    const response = await axios.post(
      "http://localhost/zaker/prayersHandling/prayersCountHandling.php",
      formData
    );
    document.getElementById("prayerCountError").textContent = "";
    // console.log(totalPrayers);
    if (response.data.prayerCount) {
      document.getElementById("prayerCountError").textContent =
        response.data.prayerCount;
      document.getElementById("prayerCount").value = "";
    }
    let previousPrayersUser = document.getElementById("usersPrayers");
    let prayer = document.getElementById("prayerCount").value;
    let previousPrayers = parseInt(totalPrayers);
    if (response.data.insertPrayer == "تم إضافة عدد صلواتك بنجاح") {  
      totalPrayers = previousPrayers + parseInt(prayer);
      document.getElementById("AllPrayers").textContent = totalPrayers;
      previousPrayersUser.textContent =
        parseInt(previousPrayersUser.textContent) + parseInt(prayer) + "صلواتك على رسول الله";
      alert(" تم إضافة عدد صلواتك بنجاح");
      document.getElementById("prayerCount").value = "";
    } else if (response.data.insertPrayer == "تم إدخال عدد صلواتك بنجاح") {
      totalPrayers = parseInt(prayer) + previousPrayers ;
      document.getElementById("AllPrayers").textContent = totalPrayers;
      previousPrayersUser.textContent = 
        parseInt(prayer) +
        parseInt(previousPrayersUser.textContent) + "صلواتك على رسول الله";
      alert(" تم إدخال عدد صلواتك بنجاح");
      document.getElementById("prayerCount").value = "";
    } else {
      alert("لم يتم الإضافة");
      document.getElementById("prayerCount").value = "";
    }
  } catch (error) {
    // التعامل مع الأخطاء في الطلب
    console.error("حدث خطأ أثناء إرسال الطلب:", error);
  }
}
