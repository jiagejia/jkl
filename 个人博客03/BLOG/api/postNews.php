<?php

include_once dirname(__FILE__) . '/conn.php';
include_once dirname(__FILE__) . '/uploadFile.php';

function head($img)
{
    //图片压缩
    $source = $img; //图片名称
    $img_info = filesize($source) / 1024;
    $dst_img = $source; //可加存放路径
    if ($img_info > 1000) {
        $percent = 0.1;  #原图压缩，不缩放
    } else if ($img_info > 500) {
        $percent = 0.3;  #原图压缩，不缩放
    } else if ($img_info > 200) {
        $percent = 0.5;  #原图压缩，不缩放
    } else {
        $percent = 1;  #原图压缩，不缩放
    }
    $image = (new imgcompress($source, $percent))->compressImg($dst_img);
    return $img_info;
}


$isCheck = true;
$msg = '';



	
	//判断form数据是否为POST而来，判断数据提交方式
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		// 非 POST 来路，做警告或你想做的事
		return;
	} else {

	    $title = $_POST["title"];
		$body = $_POST["body"];
        $username = $_POST["username"];
        $ctime = $_POST["ctime"];
        $city = $_POST["city"];



//        if (isset($_POST['url']) && $_POST['url']!="" ) {
//            $headPortrait = $_POST['url'];
//            if(preg_match('/^(data:\s*image\/(\w+);base64,)/',$headPortrait,$res)){
//                $type = $res[2];  //图片类型
//                $newImageFile  = "upload/".date('Ymd',time()).'/';
//                if(!file_exists($newImageFile)){
//                    mkdir($newImageFile,0777,true);
//                }
//                // 图片名字
//                $newImageFile = $newImageFile.time().'.'.$type;
//                $absnewImageFile = "http://localhost/api/".$newImageFile;
//                file_put_contents($newImageFile,base64_decode(str_replace($res[1],'',$headPortrait)));
//                // head($newImageFile);
//                $msg = $absnewImageFile;
//            }
//        }else{
//            $absnewImageFile = '';
//        }



    }

    if ($isCheck) {
//            $sql = "INSERT INTO news (title, msg , imgurl)  VALUES ('$title','$content','$absnewImageFile')";
        $sql = "INSERT INTO `blogs`(`title`, `body`, `username`, `ctime`, `city`) VALUES ('$title','$body','$username','$ctime','$city')";
            if (mysqli_query($conn, $sql)) {
                $msg = '添加成功';
            } else {
                $isCheck = false;
                $msg = '添加失败' . $sql;
            }
    } else {
        $isCheck = false;
        $msg = $msg;
    }

echo json_encode(
    array('isCheck' => $isCheck, 'msg' => $msg), JSON_UNESCAPED_UNICODE
);