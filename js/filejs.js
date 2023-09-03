function startCountdownAndRedirect(seconds, elementId, redirectUrl) {
  const countdownElement = document.getElementById(elementId);
  countdownElement.textContent = `سيتم التحويل خلال ${seconds} ثواني`;

  const countdownInterval = setInterval(() => {
    seconds--;
    countdownElement.textContent = `سيتم التحويل خلال ${seconds} ثواني`;

    if (seconds <= 0) {
      clearInterval(countdownInterval);
      window.location.href = redirectUrl;
    }
  }, 1000);
}

function verifyEmail() {
  // استخراج معلومات البريد الإلكتروني ورمز التحقق من عنوان الURL
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const email = urlParams.get("email");
  const vCode = urlParams.get("vCode");

  
  // بناء بيانات الطلب
  const formData = new FormData();
  formData.append("email", email);
  formData.append("vCode", vCode);
  document.getElementById("messageResponse").textContent = "";

  if (!email || !vCode) {
    document.getElementById("messageResponse").textContent = "انتهت صلاحية الرابط";
    // document.getElementById("MyParyersNumber").style.display = "none";
    
    return;
  }

  // بناء عنوان الطلب API
  const apiUrl = "http://localhost/zaker/auth/verify.php";

  // إجراء طلب POST باستخدام fetch
  fetch(apiUrl, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
     
      if (data.success) {
        document.getElementById("messageResponse").textContent = data.success;
        document.getElementById("MyParyersNumber").style.display = "flex";

        // startCountdownAndRedirect(secondsLeft, elementId, redirectUrl);
      }
      if (data.error) {
        document.getElementById("messageResponse").textContent = data.error;
        
      }
      // console.log(data); // يمكنك التعامل مع البيانات هنا
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// تعريف الدالة لإرسال البيانات
function sendData(url, data) {
  return fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  }).then((response) => response.json());
}

// تعريف دالة لمعالجة النموذج وإرساله
function handleRegistration(event) {
  event.preventDefault(); // منع إعادة تحميل الصفحة

  const formData = new FormData(document.getElementById("MyRegister"));
  const data = {};

  formData.forEach((value, key) => {
    data[key] = value;
  });

  sendData("http://localhost/zaker/auth/handlingRegister.php", data)
    .then((errors) => {
      // قم بعرض رسائل الخطأ داخل النموذج
      if (errors) {
        console.log(errors);
        document.getElementById("FirstNameError").textContent = "";
        document.getElementById("LastNameError").textContent = "";
        document.getElementById("GenderError").textContent = "";
        document.getElementById("AgeError").textContent = "";
        document.getElementById("NationalityError").textContent = "";
        document.getElementById("EmailError").textContent = "";
        document.getElementById("PasswordError").textContent = "";
        document.getElementById("PasswordConfirmError").textContent = "";
        document.getElementById("Connection").textContent = "";

        if (errors.FirstName) {
          document.getElementById("FirstNameError").textContent =
            errors.FirstName;
        }
        if (errors.LastName) {
          document.getElementById("LastNameError").textContent =
            errors.LastName;
        }
        if (errors.Gender) {
          document.getElementById("GenderError").textContent = errors.Gender;
        }
        if (errors.Age) {
          document.getElementById("AgeError").textContent = errors.Age;
        }
        if (errors.Nationality) {
          document.getElementById("NationalityError").textContent =
            errors.Nationality;
        }
        if (errors.Email) {
          document.getElementById("EmailError").textContent = errors.Email;
        }
        if (errors.Password) {
          document.getElementById("PasswordError").textContent =
            errors.Password;
        }
        if (errors.PasswordConfirm) {
          document.getElementById("PasswordConfirmError").textContent =
            errors.PasswordConfirm;
        }
        if (errors.Connection) {
          document.getElementById("Connection").textContent = errors.Connection;
          //   alert(errors.Connection);
        }
        // يمكنك استمرار العمل بنفس الطريقة مع باقي الحقول
      }
    })
    .catch((error) => {
      console.log("Error:", error);
    });
}

// تعريف دالة لمعالجة تسجيل الدخول
function handleLogin(event) {
  event.preventDefault(); // منع إعادة تحميل الصفحة

  const formData = new FormData(document.getElementById("MyLogin"));
  const data = {};

  formData.forEach((value, key) => {
    data[key] = value;
  });

  sendData("http://localhost/zaker/auth/handlingLogin.php", data)
    .then((response) => {
      document.getElementById("loginSuccess").textContent = "";
      // قم بعرض رسائل الخطأ داخل النموذج
      // console.log(response)
      if (response.message) {
        document.getElementById("loginSuccess").textContent = response.message;
        if (response.link) {
          window.location.href = "../" + response.link;
        }
      } else if (response.link) {
        window.location.href = response.link;
      }
    })
    .catch((error) => {
      console.log("Error:", error);
    });
}

function forgotPassword(event) {
  event.preventDefault(); // منع إعادة تحميل الصفحة

  const formData = new FormData(document.getElementById("MyForgotPassword"));
  const data = {};

  formData.forEach((value, key) => {
    data[key] = value;
  });
  //   console.log(data);
  sendData("http://localhost/zaker/auth/forgotPassword.php", data)
    .then((response) => {
      // قم بعرض رسائل الخطأ داخل النموذج
      console.log(response);
      document.getElementById("forgotResponse").textContent = "";
      // document.getElementById("PasswordError").textContent = "";
      // document.getElementById("PasswordConfirmError").textContent = "";
      if (response.message) {
        document.getElementById("forgotResponse").textContent =
          response.message;
      }
    })
    .catch((error) => {
      console.log("Error:", error);
    });
}

function resetPassword(event) {
  event.preventDefault(); // منع إعادة تحميل الصفحة

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const email = urlParams.get("email");
  const vCode = urlParams.get("vCode");

  const formData = new FormData(document.getElementById("MyResetPassword"));
  formData.append("email", email);
  formData.append("vCode", vCode);

  const data = {};
  formData.forEach((value, key) => {
    data[key] = value;
  });

  sendData("http://localhost/zaker/auth/forgotPassword.php", data)
    .then((response) => {
      // قم بعرض رسائل الخطأ داخل النموذج
      console.log(response);
      document.getElementById("resetResponse").textContent = "";
      document.getElementById("PasswordError").textContent = "";
      document.getElementById("PasswordConfirmError").textContent = "";
      if (response.message) {
        document.getElementById("resetResponse").textContent = response.message;
        if (response.link) {
          let secondsLeft = 5;
          let elementId = "countdown";
          let redirectUrl =  response.link;
          startCountdownAndRedirect(secondsLeft, elementId, redirectUrl);
        }
      }
      if (response.Password) {
        document.getElementById("PasswordError").textContent =
          response.Password;
      }
      if (response.PasswordConfirm) {
        document.getElementById("PasswordConfirmError").textContent =
          response.PasswordConfirm;
      }
    })
    .catch((error) => {
      console.log("Error:", error);
    });
}


// جلب معلومات المستخدم الذي نشر المقالة 
function getUsersDataNumber(){
  return fetch("http://localhost/zaker/auth/getUserNumber.php")
    .then(response => response.json())
    .then(data => {
      if (data.userError){
        alert(data.userError)
        return false;
      }
      return data; // إرجاع القيمة المستلمة
    });
}

async function addArticle(event) {
  event.preventDefault();

  const featuredImage = document.getElementById("featuredImage").files[0];

  if (featuredImage && !(['image/png', 'image/jpeg', 'image/jpg'].includes(featuredImage.type))) {
    document.getElementById("imgErrors").textContent = "الملف غير مدعوم. يجب أن يكون نوع الملف صورة (png, jpg, jpeg).";
    document.getElementById("featuredImage").value = ""
    return;
  }

  try {
    let x = await getUsersDataNumber(); // انتظار حل الوعد
    const formData = new FormData(document.getElementById("MyAddArticle"));
    formData.delete("featuredImage");
    formData.append("userId", x['UserId']);
    formData.append("featuredImage", featuredImage);

    const response = await axios.post("http://localhost/zaker/articles/handlingAddArticle.php", formData);
      document.getElementById("titleErrors").textContent = "";
      document.getElementById("contentErrors").textContent = "";
      document.getElementById("excerptErrors").textContent = "";
      document.getElementById("categoryErrors").textContent = "";
      document.getElementById("publishDateErrors").textContent = "";
      document.getElementById("keywordsErrors").textContent = "";
      document.getElementById("imgErrors").textContent = "";
      if (response.data.title) {
        document.getElementById("titleErrors").textContent = response.data.title;
      }
      if (response.data.content) {
        document.getElementById("contentErrors").textContent = response.data.content;
      }
      if (response.data.excerpt) {
        document.getElementById("excerptErrors").textContent = response.data.excerpt;
      }
      if (response.data.category) {
        document.getElementById("categoryErrors").textContent = response.data.category;
      }
      if (response.data.publishDate) {
        document.getElementById("publishDateErrors").textContent = response.data.publishDate;
      }
      if (response.data.keywords) {
        document.getElementById("keywordsErrors").textContent = response.data.keywords;
      }
      if (response.data.featuredImage) {
        document.getElementById("imgErrors").textContent = response.data.featuredImage;
      }
      if (response.data.insertArticle) {
        alert(response.data.insertArticle);
      }
      
  
  } catch (error) {
    // التعامل مع الأخطاء في الطلب
    console.error("حدث خطأ أثناء إرسال المقالة:", error);
  }
}

    

function fetchArticles() {
  const articlesGrid = document.getElementById('articlesGrid');

  fetch('http://localhost/zaker/articles/getPost.php')
    .then(response => response.json())
    .then(data => {
      articlesGrid.innerHTML = ''; // تفريغ المحتوى السابق

      data.forEach(article => {
        const articleDiv = document.createElement('div');
        articleDiv.classList.add('col-md-4', 'mb-4');
        articleDiv.innerHTML = `
          <div  class="card">
            <img src="upload/${article.FeaturedImage}" height="350px" class="card-img-top" alt="صورة المقالة">
            <div class="card-body">
              <h5 class="card-title">${article.Title}</h5>
              <p class="card-text">${article.Excerpt}</p>
              <p class="card-text">ناشر: ${article.publisher_name}</p>
              <p class="card-text">تاريخ النشر: ${article.PublishDate}</p>
              <p class="card-text">تصنيف: ${article.Category}</p>
            </div>
            <div class="btn-group" role="group" aria-label="أزرار الإجراءات">
              <button type="button" class="btn btn-info"    onclick='viewArticle(${JSON.stringify(article)})'>عرض المقال</button>
              <button type="button" class="btn btn-warning" onclick='editArticle(${JSON.stringify(article)})'>تعديل المقال</button>
              <button type="button" class="btn btn-danger"  onclick='deleteArticle(${article.ArticleId})'>حذف المقال</button>
          </div>
          </div>
        `;
        articlesGrid.appendChild(articleDiv);
      });
    })
    .catch(error => {
      console.error('حدث خطأ أثناء استدعاء المقالات:', error);
    });
}



function viewArticle(article) {
  // const articleJSON = JSON.stringify(article);
  // console.log(article.ArticleId)
  // // تحديد العنوان والمسار لصفحة عرض المقال
  // const articlePageURL = `../articles/showPost.php?article=${encodeURIComponent(articleJSON)}`;
  localStorage.setItem('articleData', JSON.stringify(article));
  // التوجيه إلى صفحة عرض المقال
  window.location.href =   "../articles/showPost.php" 

}

function editArticle(article) {
  console.log(article);
  localStorage.setItem('articleData', JSON.stringify(article));
  window.location.href =   "../articles/editArticle.php" ;

}

 function editPost(event,articleId,userArticleId) {
   event.preventDefault();

  const featuredImage = document.getElementById("featuredImage").files[0];

  if (featuredImage && !(['image/png', 'image/jpeg', 'image/jpg'].includes(featuredImage.type))) {
    document.getElementById("imgErrors").textContent = "الملف غير مدعوم. يجب أن يكون نوع الملف صورة (png, jpg, jpeg).";
    document.getElementById("featuredImage").value = ""
    return;
  }

  try {
    const formData = new FormData(document.getElementById("MyEditArticle"));
    formData.delete("featuredImage");
    formData.append("userId", UserArticleId);
    formData.append("articleId", articleId);
    formData.append("featuredImage", featuredImage);

      const response =  axios.post("http://localhost/zaker/articles/handlingEditArticle.php", formData);
      document.getElementById("titleErrors").textContent = "";
      document.getElementById("contentErrors").textContent = "";
      document.getElementById("excerptErrors").textContent = "";
      document.getElementById("categoryErrors").textContent = "";
      document.getElementById("publishDateErrors").textContent = "";
      document.getElementById("keywordsErrors").textContent = "";
      document.getElementById("imgErrors").textContent = "";
      if (response.data.title) {
        document.getElementById("titleErrors").textContent = response.data.title;
      }
      if (response.data.content) {
        document.getElementById("contentErrors").textContent = response.data.content;
      }
      if (response.data.excerpt) {
        document.getElementById("excerptErrors").textContent = response.data.excerpt;
      }
      if (response.data.category) {
        document.getElementById("categoryErrors").textContent = response.data.category;
      }
      if (response.data.publishDate) {
        document.getElementById("publishDateErrors").textContent = response.data.publishDate;
      }
      if (response.data.keywords) {
        document.getElementById("keywordsErrors").textContent = response.data.keywords;
      }
      if (response.data.featuredImage) {
        document.getElementById("imgErrors").textContent = response.data.featuredImage;
      }
      if (response.data.insertArticle) {
        alert(response.data.insertArticle);
      }
      
  
  } catch (error) {
    // التعامل مع الأخطاء في الطلب
    console.error("حدث خطأ أثناء إرسال المقالة:", error);
  }
}



function deleteArticle(articleId) {
  // اكتب الكود الخاص بحذف المقال هنا باستخدام articleId كمعرّف للمقال
  console.log(articleId)
  const data = { ArticleId: articleId };
  // console.log(data)
  sendData("http://localhost/zaker/articles/deletePost.php", data)
  .then((response) => {
    if (response.message) {
      alert(response.message);
      window.location.href =   "../articles/showArticles.php" 

    }
  });
}



async function addPrayers(event) {
  event.preventDefault();


 try {
    let x = await getUsersDataNumber(); // انتظار حل الوعد
   // الحصول على التاريخ الحالي بالتقويم الهجري
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = currentDate.getMonth() + 1;
    var day = currentDate.getDate();
    var formattedDate = day+ "-" + month + "-" + year ;
    var apiUrl = "http://api.aladhan.com/v1/gToH/" + formattedDate;
    
    const response1 = await fetch(apiUrl);
    const data = await response1.json();
    var hijriDate = data.data.hijri.date +"-"+ data.data.hijri.month.ar;

    const formData = new FormData(document.getElementById("MyParyersNumber"));
    formData.append("userId", x['UserId']);
    formData.append("hijriDate", hijriDate);
    
    const dataForm = {};
    formData.forEach((value, key) => {
      dataForm[key] = value;
    });
    console.log(dataForm.prayerCount)

     const response = await axios.post("http://localhost/zaker/prayersHandling/prayersCountHandling.php", formData);
     document.getElementById("prayerCountError").textContent = "";
    
     if (response.data.prayerCount) {
       document.getElementById("prayerCountError").textContent = response.data.prayerCount;
     }
    
if (response.data.insertArticle =="تم إضافة عدد صلواتك بنجاح") {
  var table = $('#datatablesSimple').DataTable();
  var currentRow = table.row(table.data().length - 1).data();

  if (currentRow) {
    var previousNumberPrayers = parseInt(currentRow.NumberPrayers);
    var newNumberPrayers = parseInt (previousNumberPrayers) + parseInt(dataForm.prayerCount);

    currentRow.NumberPrayers = newNumberPrayers;
    table.row(table.data().length - 1).data(currentRow).draw();
    alert("تم إضافة عدد صلواتك بنجاح")
  } else if (response.data.insertArticle =="تم إدخال عدد صلواتك بنجاح"){
    table.row.add({
      "ترتيب": table.data().length + 1,
      "NumberPrayers": dataForm.prayerCount,
      "Date": dataForm.hijriDate
    }).draw();
    alert("تم إدخال عدد صلواتك بنجاح")
  }
} else {
  alert("لم يتم الإضافة");
}

 } catch (error) {
   // التعامل مع الأخطاء في الطلب
   console.error("حدث خطأ أثناء إرسال الطلب:", error);
 }
}



async function addPrayersIndex(event) {
  event.preventDefault();


 try {
    let x = await getUsersDataNumber(); // انتظار حل الوعد
   if(x == false){
    return
   }
   // الحصول على التاريخ الحالي بالتقويم الهجري
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = currentDate.getMonth() + 1;
    var day = currentDate.getDate();
    var formattedDate = day+ "-" + month + "-" + year ;
    var apiUrl = "http://api.aladhan.com/v1/gToH/" + formattedDate;
    
    const response1 = await fetch(apiUrl);
    const data = await response1.json();
    var hijriDate = data.data.hijri.date +"-"+ data.data.hijri.month.ar;

    const formData = new FormData(document.getElementById("MyParyersNumber"));
    formData.append("userId", x['UserId']);
    formData.append("hijriDate", hijriDate);
    
    const dataForm = {};
    formData.forEach((value, key) => {
      dataForm[key] = value;
    });
    console.log(dataForm.prayerCount)

     const response = await axios.post("http://localhost/zaker/prayersHandling/prayersCountHandling.php", formData);
     document.getElementById("prayerCountError").textContent = "";
    
     if (response.data.prayerCount) {
       document.getElementById("prayerCountError").textContent = response.data.prayerCount;
     }
    
if (response.data.insertArticle =="تم إضافة عدد صلواتك بنجاح") {
 
  let prayer = document.getElementById("prayerCount").value;
  let previousPrayers = parseInt(document.getElementById("AllPrayers").innerHTML);
  let totalPrayers = previousPrayers + parseInt(prayer);
  document.getElementById("AllPrayers").innerHTML = totalPrayers + " صلاة";
  alert(" تم إضافة عدد صلواتك بنجاح")

  
}else if(response.data.insertArticle =="تم إدخال عدد صلواتك بنجاح"){
  let prayer = document.getElementById("prayerCount").value;
  let previousPrayers = parseInt(document.getElementById("AllPrayers").innerHTML);
  let totalPrayers = previousPrayers + parseInt(prayer);
  document.getElementById("AllPrayers").innerHTML = totalPrayers + " صلاة";  
  alert(" تم إدخال عدد صلواتك بنجاح")

}
else {
  alert("لم يتم الإضافة");
}

 } catch (error) {
   // التعامل مع الأخطاء في الطلب
   console.error("حدث خطأ أثناء إرسال الطلب:", error);
 }
}


async function getPrayersAll() {
  try {
  
    const response = await axios.get("http://localhost/zaker/prayersHandling/getPrayersAll.php");
    console.log(response.data[0]["TotalPrayers"])

    document.getElementById("AllPrayers").innerHTML = response.data[0]["TotalPrayers"] + "صلاة"
   
    
    

    // return  JSON.stringify(response.data);

  } catch (error) {
    console.error("حدث خطأ أثناء إرسال الطلب:", error);
  }
}

       