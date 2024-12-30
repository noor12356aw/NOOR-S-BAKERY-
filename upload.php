<?php
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOK = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$message = ""; // Initialize a message to collect all alerts

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $message .= "File is an image - " . $check["mime"] . ".\n";
    } else {
        $message .= "File is not an image.\n";
        $uploadOK = 0;
    }
}

if (file_exists($target_file)) {
    $message .= "Sorry, file already exists.\n";
    $uploadOK = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    $message .= "Sorry, file is too large.\n";
    $uploadOK = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
    $message .= "Sorry, only JPG, PNG, and GIF files are allowed.\n";
    $uploadOK = 0;
}

if ($uploadOK == 0) {
    $message .= "Sorry, your file was not uploaded.\n";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $message .= "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.\n";
    } else {
        $message .= "Sorry, there was an error uploading your file.\n";
    }
}

// Show a single alert and redirect to cake.php
if (!empty($message)) {
    echo "<script>alert(`$message`); window.location.href = 'cake.php';</script>";
}
?>
