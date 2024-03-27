<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

$uploadDir = 'upload/' . session_id() . '/' . $randomHex;
if (!file_exists($uploadDir)) {
    mkdir($uploadDir);
}

if (isset($_FILES["file"])) {
    $error = '';
    $success = '';
    try {
        $file = $uploadDir . "/" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $file);
        $success = 'File uploaded successfully. Now a hidden dir is created. Take a look.<br>';
    } catch (Exception $e) {
        $error = $e->getMessage();
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
<p class="display-4 text-center red-text">Goal: Get the 'TRUE' flag! But at first, try to upload smt.</p>
<br/>
<div class="centered">
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file" class="font-weight-bold">Select file to upload:</label>
            <input type="file" class="form-control-file" name="file" id="file">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
<span><?php echo $error; ?></span>
<span><?php echo $success; ?></span> 
 <!-- /upload/🍪️/your_payload_name for checking where are you then get the true flag-->
 <!-- /var/www/html/-->
<br>
</body>
</html>



