<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: fileupload.php");
    exit;
// loi giai bai 1

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username === "admin" && $password === "1 to 1000") {
        $_SESSION["username"] = $username;
        header("Location: fileupload.php");
        exit;
    } else {
    // loi giai bai 2
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    // loi giai bai 3 
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
                               <!-- wanna get username ? Are you admin ? -->
            <input type="password" name="password" placeholder="Password" required><br>
                              <!-- wanna get password ? Try : 1 to 1000 -->  
            <input type="submit" value="Login">
            <span style="color:red"><?php echo isset($error) ? $error : ''; ?></span>
        </form>
    </div>
</body>
</html>
