<?php
include 'header.php';
$userid = $_SESSION['userid'];
$post_text = $_POST['post_text'];

$new_filename = $_FILES['fileToUpload']['name'];
$uploaddir = '../uploads/';

$uploadfile = $uploaddir . basename($new_filename);
$timestamp = date('Y-m-d H:i:s');
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile))
{
    $text = $_POST['post_text'];
    
    $sql_insert = "INSERT INTO posts (userid, timestamp, image, text) 
    VALUES ('".$userid."', '".$timestamp."', 
    '".$new_filename."', '".$post_text."');";
    mysqli_query($connect, $sql_insert);

    $sql_posts = "SELECT posts.*, users.username FROM posts JOIN users ON posts.userid = users.id WHERE posts.userid='".$userid."'";
    $result_posts = mysqli_query($connect, $sql_posts);
    $row_posts = mysqli_fetch_assoc($result_posts);
    echo $row_posts['username'];
    
    echo "<script type='text/javascript'>alert('Upload Successful'); header('location: index.php')</script>";
    echo "File is valid and was successfully uploaded.\n";
}
else
{
    echo "File upload not successful\n";
    echo 'Here is some more debugging info:';
    print_r($_FILES);
}
?>