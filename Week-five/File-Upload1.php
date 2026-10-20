<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="">Name: </label>
        <input type="text" name="name" placeholder="Enter your fullname"> <br><br>
        
        <label for="">Profile</label>
        <input type="file" name="profile" > <br> <br>

        <input type="submit" name="submit" value="Register"> <br>
    </form>
</body>
</html>

<?php

echo "<h2> Register Information </h2>";

if (isset($_POST["submit"])) {
        echo "File Information <br>";
        echo "Name: " . $_FILES["profile"]["name"]  . "<br>";
        echo "Size: " . $_FILES["profile"]["size"]  . "<br>";
        echo "Temp: " . $_FILES["profile"]["tmp_name"]  . "<br>";
        echo "Type: " . $_FILES["profile"]["type"]  . "<br>";

        echo "<br>";

        // if (move_uploaded_file($_FILES["profile"]["tmp_name"], "Images/" . $_FILES["profile"]["name"])) {
        //     echo "File has been uploaded successfully";
        // }
        // else {
        //     echo "File has not been uploaded successfully";
        // }

        $filename = explode (".", $_FILES["profile"]["name"]);
        $extension = end($filename);
        $extensions = array("png", "jpg", "jpeg", "gif");
        $extension = strtolower($extension);
        
        if ($_FILES["profile"]["size"] <= 2097152) {
            if (in_array($extension, $extensions)) {
                if (!file_exists("Images/" . $_POST["name"] . "." .  $extension)) {
                    if (move_uploaded_file($_FILES["profile"]["tmp_name"], "Images/" . $_POST["name"] . "." .  $extension)) {
                        echo "The File has been uploaded successfully <br>";
                        echo "Your name is: " . $_POST["name"] . "<br>";
                        echo '<img src="' . "Images/" . $_POST["name"] . "." .  $extension . '" width="100px" alt="">' . "<br>";
                    }
                    else {                    
                        echo "The File has not been uploaded successfully";
                    }
                }
                else {
                    echo "This file " . "Images/" . $_POST["name"] . "." .  $extension . " already exist";
                }
            }
            else {
                echo "This file extension ($extension) is not allowed";
            }
        }
        else {
            echo "This File Size " . $_FILES["profile"]["size"] . " is too big";
        }
}

?>