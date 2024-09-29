<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);

    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style> 
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  background-image: url("image.jpg"); 
  background-size: cover; 
  background-repeat: no-repeat; 
  background-position: center center; 
}

.container {
  margin: 0 auto; 
  padding: 100px;
  max-width: 350px; 
  border-style: groove;
  border-radius: 10px;
  border-color: 57A3B1;
  min-height: 25vh; 
}

h2 {
  text-align: center;
  background-color: azure;
  color: blue;
  border-radius: 5px;
  
}

.form-group {
  margin-bottom: 15px;
  align-items: center;
  color: lightcyan; 

}
input{
    margin: 7px;
    padding: 5px;
    border-radius: 8px;
    background: lightblue;
    font-size: 16;
    color: black;
    
}
.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
  margin: 7px;
  padding: 6px;
  border-radius: 5px;
}</style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <script>
    function validateForm() {
  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  if (username == "" || email == "" || password == "") {
    alert("Please fill out all fields.");
    return false;
  }

  return true;
}
    </script>
</body>
</html>