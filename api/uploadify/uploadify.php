<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination

//本文件由uploadify官方提供，第一php网对其进行了修改和注释
$targetFolder = '../../data/upload'; //设置上传目录
include_once "../../include/function/image.php"; //图片缩小处理
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); //允许的文件后缀
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	$tmpname = time().rand(0000,9999).rand(0000,9999);
	$imgname = $tmpname.'.'.$fileParts['extension']; //修改后的上传图片路径[新的]
	$targetFile =$targetFolder. '/' . $imgname;

	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		//echo $_FILES['Filedata']['name'];//上传成功后返回给前端的数据
		echo $imgname;
		file_put_contents($_POST['id'].'.txt','上传成功了！');
		ResizeImage($targetFile, $targetFolder.'/'.$tmpname.'_s', 80, 80,1); //缩小处理
	} else {
		echo '不支持的文件类型';
	}
}
?>