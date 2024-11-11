<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
// fakjdshfjk najkdfn baejkwfnadnfa kenak

// Define a random string for the subdirectory name
$randomstring = '12345abcde';

// Define the base upload directory
$baseUploadDir = __DIR__ . '/upload';

// Define the user's session-specific directory
$uploadDir = $baseUploadDir . '/' . session_id() . '/' . $randomstring;
// lfanewkfnnkcvnackadclwc 
// Create the session-specific directory if it doesn't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0750, true);
}

$error = '';
$success = '';

// Handle file upload
// oawffdksc iow 
    try {
        $filePath = $uploadDir . '/' . basename($_FILES["file"]["name"]);
        
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)) {
            $success = 'File uploaded successfully.<br>';
        } else {
            $error = 'Failed to upload the file.';
        }
    } catch (Exception $e) {
        $error = 'Error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FileTraversal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"
          integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <p class="display-4 text-center text-danger">Get the flag that inside directory "secret". But where is that directory ?</p>
    <br/>
    <div class="container">
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file" class="font-weight-bold">Select file to upload:</label>
                <input type="file" class="form-control-file" name="file" id="file" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <!-- You can upload a simple RCE payload to look around-->
            </div>
        </form>
    </div>
    <br>
</body>
</html>
