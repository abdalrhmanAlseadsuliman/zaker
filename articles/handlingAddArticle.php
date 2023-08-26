<?php
include "../auth/functionRegisteration.php";

function lenExcerpt($excerpt, &$response)
{

    if (strlen($excerpt) > 500) {
        $response['excerpt'] = "يجب ألا يتجاوز نص المقتطف 500 حرف.";
        return false;
    } else {
        return true;
    }
}

function callLenExcerptAndIsValid($fields,$data,&$response){
    $valid = true;
    if(  !lenExcerpt($data['excerpt'], $response)){
        $valid = false;

    } 
    if(!isValidData($fields, $data, $response) ){
        $valid = false;
    }
    return $valid;
}

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $json = file_get_contents('php://input');
    // $data = json_decode($json, true);
    $postData = $_POST;
    // print_r($postData);
    // print_r ($_FILES);
    $requiredFields = [
        'title' => 'عنوان المقالة',
        'content' => 'محتوى المقالة',
        'category' => 'تصنيف المقالة',
        'excerpt' => ' مقتطف المقالة ',
        'publishDate' => 'تاريخ نشر المقالة',
        'keywords' => 'الكلمات المفتاحية'
    ];
    if (
        callLenExcerptAndIsValid($requiredFields,$postData,$response)
    ) {
        foreach ($postData as $key => $value) {
            $postData[$key] = sanitizeInput($value);
        }
        $postData['userId'] = (int)$postData['userId'];

        if (isset($_FILES['featuredImage']) && !empty($_FILES['featuredImage'])) {
            // $extension = pathinfo($_FILES['featuredImage']['name'], PATHINFO_EXTENSION);
            // $new_name = time() . '.' . $extension;
            // move_uploaded_file($_FILES['featuredImage']['tmp_name'], 'upload/' . $new_name);
            // $name = $_FILES['featuredImage']['name'];
            // $response["featuredImage"] = $name;
            $uploadFolder = 'upload/';
            $imageTmpName = $_FILES['featuredImage']['tmp_name']; // اسم الملف المؤقت
            $imageName = $_FILES['featuredImage']['name']; // اسم الملف الأصلي
            $result = move_uploaded_file($imageTmpName, $uploadFolder . $imageName); // نقل الملف المؤقت إلى المكان المحدد
            if ($result) {
                $sql = "INSERT INTO articles (Title,Content,Category,Excerpt,PublishDate,Keywords,FeaturedImage,UserIdArticle) 
                VALUES ('$postData[title]','$postData[content]','$postData[category]','$postData[excerpt]' ,'$postData[publishDate]','$postData[keywords]','$imageName', $postData[userId])";
                if (mysqli_query($connection, $sql)) {
                    $response["insertArticle"] = " تم إضافة المقال بنجاح ";
                } else {
                    $response["insertArticle"] = " هناك خطا اثناء الاضافة ";
                }
            } else {
                $response["featuredImage"] = " يرجى إعادة رفع الصورة ";
            }
        } else {
            $response["featuredImage"] = " حقل الصورة مطلوب ";
        }
    } else if (!isset($_FILES['featuredImage']) && empty($_FILES['featuredImage'])) {
        $response["featuredImage"] = " حقل الصورة مطلوب ";
    }
}
// print_r($response);

echo json_encode($response);
