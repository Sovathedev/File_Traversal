<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symliping</title>
</head>
<body>
    <h1>symliping</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
        $uploadDir = "uploads/";
        $target_file = $uploadDir . basename($_FILES["file"]["name"]);

   
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";

        
            $output = shell_exec("unzip " . $target_file . " -d " . $uploadDir);
            echo "<pre>$output</pre>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="file" id="File">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
