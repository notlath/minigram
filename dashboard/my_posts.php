<?php
include "header.php";
$userid = $_SESSION['userid'];
$sql_posts = "SELECT * FROM posts WHERE userid='".$userid."'";
$res_posts = mysqli_query($connect, $sql_posts);

while($row_posts = mysqli_fetch_array($res_posts))
{
    echo "<center><div class='table-responsive' style='width: 90%'>";
    echo "<table class='table table-bordered'>";
    
    // POST ID
    echo "<tr><th width='20%'>POST ID</th>";
    echo "<td>".$row_posts['postid']."</td></tr>";
    
    // IMAGE
    echo "<tr><th>IMAGE</th>";
    echo "<td><img src='../uploads/".$row_posts['image']."' alt='".$row_posts['image']."'/></td></tr>";
    
    // DATE POSTED
    echo "<tr><th>DATE POSTED</th>";
    echo "<td>".date('Y-m-d', strtotime($row_posts['timestamp']))."</td></tr>";
    
    // TEXT
    echo "<tr><th>TEXT</th>";
    echo "<td>".$row_posts['text']."</td></tr>";
    
    echo "</table></div></center>";
}
?>

<script>
let timestamp = document.getElementById('timestamp').innerHTML;
document.getElementById('timestamp').innerHTML = moment(timestamp).fromNow();

</script>