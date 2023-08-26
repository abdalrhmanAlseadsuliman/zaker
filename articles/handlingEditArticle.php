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
    if( !isset($data['articleId']) && empty($data['articleId'])){
        $response["articleId"] = "خطأ في البيانات المرسلة";
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
        $postData['articleId'] = (int)$postData['articleId'];


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
                $sql = "UPDATE articles 
                SET Title = '$postData[title]', 
                    Content = '$postData[content]', 
                    Category = '$postData[category]', 
                    Excerpt = '$postData[excerpt]', 
                    PublishDate = '$postData[publishDate]', 
                    Keywords = '$postData[keywords]', 
                    FeaturedImage = '$imageName' 
                    WHERE ArticleId = $postData[articleId] AND UserIdArticle = $postData[userId]";
                if (mysqli_query($connection, $sql)) {
                    $response["insertArticle"] = " تم تحديث المقال بنجاح ";
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
