<?php
$host = "localhost";
$port = 3306;
$user = "root";
$password = "Killerclaw48";
$dbname = "users";

$conn = new mysqli($host, $user, $password, $dbname, $port)
	or die('Could not connect to the database server' . mysqli_connect_error());

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DocVR Signup</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
		integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
		integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
		crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-nav">
				<a class="nav-link active" href="home.html">Home</a>
			</div>
			<div class="navbar-nav">
			</div>
			<div class="navbar-nav">
				<a href="signup.php" class="nav-link active">Signup</a>
				<a href="login.php" class="nav-link active">Login</a>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-top: 20px;">
	<h1>Sign-up</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<div class="row">
				<div class="col-md-4">
					<label for="fName" class="form-label">First Name</label>
					<input type="text" id="fName" name="fName" class="form-control"
						placeholder="Enter your first name here..." required>
				</div>
				<div class="col-md-4">
					<label for="lName" class="form-label">Last Name</label>
					<input type="text" id="lName" name="lName" class="form-control"
						placeholder="Enter your last name here..." required>
				</div>
				<div class="col-md-4">
					<label for="email" class="form-label">Email Address</label>
					<input type="email" id="email" name="email" class="form-control"
						placeholder="Enter your email here..." required>
				</div>
			</div>
			<div class="row" style="margin-top: 20px;">
				<div class="col-md-6">
					<label for="passkey" class="form-label">Password</label>
					<input type="password" id="passkey" name="passkey" class="form-control"
						placeholder="Enter your password here..." required>
				</div>
				<div class="col-md-6">
					<label for="license" class="form-label">Medical License</label>
					<input type="file" class="form-control" id="license" name="license" />
				</div>
			</div>
			</br></br>
			<button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<script src="script.js"></script>
</body>

</html>

<?php
$fName = $email = $lName = $passkey = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fName = test_input($_POST["fName"]);
	$lName = test_input($_POST["lName"]);
	$email = test_input($_POST["email"]);
	$passkey = test_input($_POST["passkey"]);
	$sql = "INSERT INTO users(firstName, lastName, email, passkey, isDoctor) VALUES ('$fName','$lName','$email','$passkey', '0')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
