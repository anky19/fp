<?php include('connection.php');
session_start();
$message = $link = '';
if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$query = "SELECT * FROM you_tube WHERE email = '".$email."'";
	$result = $conn->query($query);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$id = $row['ID'];
		$id_encode = base64_encode($id);
		$link = "<a href='Reset_pass.php?MnoQtyPXZORTE=$id_encode' class='signin-button'><center>Recieve Mail</center></a>";
	}
	}else{
		$message = "<div>Invalid Email..!!</div>";
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
<body >

	<center>
		<div class="login-div">
		<div class="logo"></div>
		<div class="title">IVMS Password Reset</div>
			<form method="post">
			<?php echo $message; ?>
				<h1 >Forget Password</h1>
				<label for="Email">Email</label>
				<input type="text" name="email" placeholder="Email Address" class="password" required><br><p>
				<button type="submit" name="submit" class="signin-button">Reset Password</button>
				<?php echo $link; ?>
				</div>

			</form>
</center>
		
</body>
</html>
