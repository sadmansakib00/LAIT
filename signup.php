<!DOCTYPE html>
<html>
<head>
	<title>Admin Sign Up</title>
</head>
<body>
	<h1>Admin Sign Up</h1>
	<form action="process_signup.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password" required><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
