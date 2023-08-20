function verifyEmail() {
    // استخراج معلومات البريد الإلكتروني ورمز التحقق من عنوان الURL
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const email = urlParams.get('email');
    const vCode = urlParams.get('vCode');

    // بناء بيانات الطلب
    const formData = new FormData();
    formData.append('email', email);
    formData.append('vCode', vCode);

    // بناء عنوان الطلب API
    const apiUrl = 'http://localhost/zaker/auth/verify.php';

    // إجراء طلب POST باستخدام fetch
    fetch(apiUrl, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("messageResponse").textContent = "";
        if (data.success) {
            document.getElementById("messageResponse").textContent = data.success;
            window.location.href = '../login.php'
        }
        if (data.error) {
            document.getElementById("messageResponse").textContent = data.error;
            window.location.href = '../login.php'
        }
        // console.log(data); // يمكنك التعامل مع البيانات هنا

    })
    .catch(error => {
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
    })
    .then(response => response.json())
    
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
    .then(errors => {
        // قم بعرض رسائل الخطأ داخل النموذج
        if (errors) {
            console.log(errors)
            document.getElementById("FirstNameError").textContent = "";
            document.getElementById("LastNameError").textContent = "";
            document.getElementById("GenderError").textContent = "";
            document.getElementById("AgeError").textContent = "";
            document.getElementById("NationalityError").textContent = "";
            document.getElementById("EmailError").textContent = "";
            document.getElementById("PasswordError").textContent = "";
            document.getElementById("PasswordConfirmError").textContent = "";


            if (errors.FirstName) {
                document.getElementById("FirstNameError").textContent = errors.FirstName;
            }
            if (errors.LastName) {
                document.getElementById("LastNameError").textContent = errors.LastName;
            }
            if (errors.Gender) {
                document.getElementById("GenderError").textContent = errors.Gender;
            }
            if (errors.Age) {
                document.getElementById("AgeError").textContent = errors.Age;
            }
            if (errors.Nationality) {
                document.getElementById("NationalityError").textContent = errors.Nationality;
            }
            if (errors.Email) {
                document.getElementById("EmailError").textContent = errors.Email;
            }
            if (errors.Password) {
                document.getElementById("PasswordError").textContent = errors.Password;
            }
            if (errors.PasswordConfirm) {
                document.getElementById("PasswordConfirmError").textContent = errors.PasswordConfirm;
            }
            if (errors.Connection) {
                document.getElementById("Connection").textContent = errors.Connection;
                alert(errors.Connection)
            }
            // يمكنك استمرار العمل بنفس الطريقة مع باقي الحقول
        }
    })
    .catch(error => {
        console.log("Error:", error );
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
    
    document.getElementById("loginSuccess").textContent = "";

    sendData("http://localhost/zaker/auth/handlingLogin.php", data)
    .then(response => {
        // قم بعرض رسائل الخطأ داخل النموذج
        // console.log(response)
        if (response.message) {
            document.getElementById("loginSuccess").textContent = response.message;
            if (response.link) {
                 window.location.href = response.link 
            }
        }else if (response.link) {
            window.location.href = response.link 
        }
    })
    .catch(error => {
        console.log("Error:", error );
    });


}

// تعريف دالة لإضافة مقال
function addArticle() {
    // اضف الكود الخاص بإضافة المقال هنا
}

// استدعاء الدالة handleRegistration عند النقر على زر التسجيل
// document.getElementById("registerButton").addEventListener("click", handleRegistration);

// استدعاء الدالة handleLogin عند النقر على زر تسجيل الدخول
// document.getElementById("loginButton").addEventListener("click", handleLogin);

// استدعاء الدالة addArticle عند النقر على زر إضافة مقال
// document.getElementById("addArticleButton").addEventListener("click", addArticle);
