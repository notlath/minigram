<!-- -->

<?php
include 'header.php';

if(isset($_POST['delete_post_submit']))
{
    $postid = $_POST['postid'];
    $sql_posts = "SELECT * FROM posts WHERE postid='".$postid."' AND userid='".$_SESSION['userid']."'"; 
    $res_posts = mysqli_query($connect, $sql_posts);
    if(mysqli_num_rows($res_posts) > 0)
    {
        $sql_posts_delete = "DELETE FROM posts WHERE postid='" . $postid . "' AND userid='".$_SESSION['userid']."'";
        $res_posts_delete = mysqli_query($connect, $sql_posts_delete);
        echo "<script> alert('Deleted post ".$postid."'); window.location('index.php');</script>";
    }    
    else
        echo "<script> alert('Post not found or uploaded by another user'); window.location('index.php');</script>";

}

?>
<form method="post" action="" enctype="multipart/form-data">
    <center>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td><center>Enter Post ID: </center></td>
                    <td><center><input type="number" name="postid"></center> </td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" name="delete_post_submit"/></center></td>
                </tr>
            </table>
        </div>
    </center>
</form>
