<?php
$servername = "localhost";
$username = "root";
$password = "Killerclaw48";
$dbname = "users";
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DocVR Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" style="border-radius: 10px; background-color: #b8b8b8; padding: 20px; margin-top: 20px; border: 1px solid black;">
      <h1 style="padding-bottom: 10px;">Login</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="email" id="email" name="email" class="form-control" placeholder="E-mail"
            style="margin-bottom: 25px;">
          <input type="password" id="passkey" name="passkey" class="form-control" placeholder="Password"
            style="margin-bottom: 25px;">
          <input type="submit" id="submitButton" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>

<?php
// define variables and set to empty values
$email = $passkey = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $passkey = test_input($_POST["passkey"]);
  $sql = "SELECT passkey FROM users WHERE email = '$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["passkey"] == $passkey) {
      echo "Login successful!";
    } else {
      echo "Your password is incorrect.";
    }
  } else {
    echo "Your email doesn't exist in our database.";
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
