
<?php 

require_once '008-loadJSONFile.php';


function uploadfile(){
	if (empty($_POST['title'])) {
		# code...
		$GLOBALS['error_msg'] = '请输入标题';
		return;
	}

	if (empty($_POST['artist'])) {
		# code...
		$GLOBALS['error_msg'] = '请输入歌手';
		return;
	}

	if (empty($_POST['images'])) {
		# code...
		$GLOBALS['images'] = '请输入图片';
		return;
	}

	if (empty($_POST['source'])) {
		# code...
		$GLOBALS['error_msg'] = '请输入地址';
		return;
	}
	$input = $_POST;	
	$input['id'] = count($arr)+1;
	var_dump($input);

	// 判断文件是否上传
	if (empty($_FILES['images'])) {
		# code...
		// 客户端提交表单中有image文件域
		$GLOBALS['error_msg'] = '请正确提交文件';
		return;
	}

	// 校验文件大小和类型
	// 

	$source = $_FILES['source'];
	// uniqid()生成一个随机的标识，防止文件重名被覆盖掉
	$target = './uploads/' . uniqid() . $source['name'];

	if (!move_uploaded_file($source['tem_name'],$target)) {
		$GLOBALS['error_msg'] = '上传文件失败';
		return;
	}

	echo "上传和移动文件成功";
	

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// 接收文件的变量是一个超全局变量
	uploadfile();
	
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>添加音乐</title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}

		div{
			width: 1000px;
			margin: 0 auto;
		}
		div p{
			margin-top: 30px;
			color: gray;
		}
		div input{
			width: 100%;
			height: 30px;
			display: block;
			margin: 20px 0;
		}

		div button{
			margin-top: 50px;
			width: 100%;
			height: 40px;
			background-color: blue;
			border-radius: 5px;
			font-size: 18px;
			color: white;
		}
	</style>
</head>
<body>
	<!-- 设置文件上传的格式enctype -->
	<!-- 不上传文件enctype可以不用添加 -->
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype='multipart/form-data'>
		<div>
			<p>标题</p>
			<input type="text" name="title">

			<p>歌手</p>
			<input type="text" name="artist">

			<p>海报</p>
			<input type="text" name="images">

			<p>地址</p>
			<input type="text" name="source">

            <!-- accept属性可以限制添加的文件类型 值是MIME Type 比如图片 image/* 设置所有上传文件，不能解决文件的限制，还是要在服务端继续校验 -->
			<input type="file" name="file" accept="">

			<?php if (isset($error_msg)): ?>
				<p><?php echo $error_msg ?></p>
			<?php endif ?>

			<button type="submit">提交</button>
	    </div>

	</form>

	

</body>
</html>