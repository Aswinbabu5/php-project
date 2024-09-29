<?php
include 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        
        $_SESSION['user_id'] = $user['id'];
        header('Location: task.php');
    } else {
        echo "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  background-image: url("imge.jpg");
  padding: 10px;
}

.container {
  margin: 0 auto; 
  padding: 20px;
  max-width: 400px;
  border-style: groove;
  border-radius: 10px;
  border-color: 57A3B1;
  min-height: 25vh; 
}

h2 {
  text-align: center;
  background-color: azure;
  color: blue;

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
  margin: 5px;
  padding: 5px;
  border-radius: 5px;
}
</style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <div class="form-group">
                <label for="lowercase">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lowercase">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <script>
        
function validateForm() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  if (email == "" || password == "") {
    alert("Please fill out all fields.");
    return false;
  }
}
</script>
</body>
</html>