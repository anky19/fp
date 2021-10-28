<?php include('connection.php');
session_start();
$id = $_GET['MnoQtyPXZORTE'];
$message = $Home = '';
$_SESSION['user'] = $id;
if ($_SESSION['user'] == '') {
		header("location:forget_pass.php");
}
else
{
if(isset($_POST['submit'])) {
	$password = $_POST['password'];
	$Repassword = $_POST['Repassword'];

	if ($password !== $Repassword) {
		$message = "<div>Password Not Match..!!</div>";
	}
	else{
	$id_decode = base64_decode($id);
	$query = "UPDATE you_tube SET password = '$password' WHERE id = '$id_decode' ";
	$result = $conn->query($query);
		if($result){
			$message = "<div class='alert alert-success'>Reset Your Password Successfully..</div>";
			$Home = "<a href='index.php' class='signin-button'>Login</a>";
	}else{
		$message = "<div class='alert alert-danger'>Failed to Reset Password..!!</div>";
	}
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>forget Password</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
<center>
	<div class="login-div">
		<div class="logo"></div>
		<div class="title">IVMS Password Reset</div>
		<div class="fields">
			<form method="post">
				<?php echo $message; ?>
				<h1 class="text-success">Forget Password</h1>
				<label for="password">Password</label>
				<input type="text" name="password" placeholder="Password" class="password" required><br>
				<label for="password">Retype Password</label>
				<input type="text" name="Repassword" placeholder="Retype Password" class="password" required><br>
				<button type="submit" name="submit" class="signin-button" >Reset Password</button> <?php echo $Home; ?>
			</form>
		</div>
</center>
</body>
</html>