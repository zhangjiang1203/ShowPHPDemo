<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	 // var_dump($_POST);
	 $message = NULL;
	 $username = $_POST['username'];
	 if (empty($username)) {
	 	$message = "用户名为空，请重试";
	 }else{
		 $password = $_POST['password'];
		 if (empty($password)) {
		 	$message = "请输入密码";
		 }else{
		 	if ($password != $_POST['confirmPSD']){
	 			$message = "两次密码输入不一致误，请重新输入";
			 }else{
			 	if ($_POST['agree'] != 'true') {
			 		$message = "请同意该协议";
			 	}else{
			 		foreach ($_POST as $key => $value) {
				    	if ($key == 'username' or $key == 'password') {
				    		 $tempArr[] = $value;
				         }
			        }
				     var_dump($tempArr);
				     // 添加数据
				     // 写入到文件中
				     $file = fopen('names.txt','a+');
				     // 将数组转化为 字符串，每个元素添加' | '
				     $show = implode(' | ',$tempArr);
				     // 添加换行操作
				     fwrite($file,"$show\r\n");
				     fclose($file);
			 	}
			 }
		 }
	 }   	
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>注册界面</title>
</head>
<body>
	<!-- 
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
		用户民:<input type="text" name="username">
		<br>
		密码:<input type="password" name="password">
		<br>
		确认密码:<input type="password" name="confirmpassword">
		<br>
		<label><input type="checkbox" name="agree"> 同意该协议</label>
		<br>
		<button type="submit">开始注册</button>
	</form> -->

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<table>
			<!-- 添加label 扩大点击区域 -->
			<tr>
				<td><label for="username">用户名</label></td>
				<td><input type="text" name="username" id="username" value="<?php echo isset($username)? $username : ''; ?>"></td>
			</tr>
			<tr>
				<td><label for="password">密码</label></td>
				<td><input type="password" name="password" id="password"></td>
			</tr>
			<tr>
				<td><label for="confirmPSD">确认密码</label></td>
				<td><input type="password" name="confirmPSD" id="confirmPSD"></td>
			</tr>
			<tr>
				<td></td>
				<td><label><input type="checkbox" name="agree" value="true"> 同意该协议</label></td>
			</tr>
			<?php if (isset($message)): ?>
				<tr>
				<td></td>
				<td><?php echo $message; ?></td>
			</tr>
			<?php endif ?>
			<tr>
				<td></td>
				<td><button type="submit">开始注册</button></td>
			</tr>
			
		</table>
	</form>

	

</body>
</html>