<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: fileupload.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username === "from 1 to 1000" && $password === "root") {
        $_SESSION["username"] = $username;
        header("Location: fileupload.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
                               <!-- wanna get username ? Try : from 1 to 1000 -->
            <input type="password" name="password" placeholder="Password" required><br>
                              <!-- wanna get password ? Try : root -->  
            <input type="submit" value="Login">
            <span style="color:red"><?php echo isset($error) ? $error : ''; ?></span>
        </form>
    </div>
</body>
</html>
